<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DuThi;
use App\Models\HocVien;
use App\Models\LichThi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DuThiController extends Controller
{
    public function index()
    {
        // Lấy danh sách dự thi với thông tin liên quan
        $duThiList = DuThi::with('hocVien', 'lichThi')->get();

        // Lọc và sắp xếp theo số báo danh
        $duThiList = $duThiList->sortBy(function ($duThi) {
            // Lấy giá trị "NC" hoặc "CB" từ cột ung_dung_cntt của bảng HocVien
            $ungDungCntt = $duThi->hocVien->ung_dung_cntt;

            // Lấy số báo danh
            $soBaoDanh = $duThi->So_bao_danh;

            // Sắp xếp theo giá trị "NC" hoặc "CB" trước
            if (strpos($soBaoDanh, 'NC') !== false) {
                return 1;
            } elseif (strpos($soBaoDanh, 'CB') !== false) {
                return 2;
            } else {
                return 3;
            }
        });

        // Trả về view index.blade.php với dữ liệu
        return view('du_thi.index', compact('duThiList'));
    }

    public function create()
    {
        $hocVienList = HocVien::where('ung_dung_cntt', 'Cơ bản')->get(); // Lấy danh sách học viên cơ bản
        $maxIdHocVienCuoi = HocVien::where('ung_dung_cntt', 'Cơ bản')->max('id_hoc_vien'); // Lấy id của học viên cuối
        $lichThiList = LichThi::all(); // Lấy danh sách lịch thi
        return view('du_thi.create_co_ban', compact('hocVienList', 'maxIdHocVienCuoi', 'lichThiList'));
    }

    public function store(Request $request)
{
    // Validate incoming request data
    $validator = Validator::make($request->all(), [
        'id_hoc_vien_dau' => 'required|exists:hoc_vien,id_hoc_vien', // Kiểm tra xem id_hoc_vien_dau có tồn tại trong bảng hoc_vien
        'id_hoc_vien_cuoi' => 'required|exists:hoc_vien,id_hoc_vien', // Kiểm tra xem id_hoc_vien_cuoi có tồn tại trong bảng hoc_vien
        'id_lich_thi' => 'required|exists:lich_thi,id_lich_thi', // Kiểm tra xem id_lich_thi có tồn tại trong bảng lich_thi
        'so_giua' => 'required|numeric|min:0|max:99', // Số giữa phải nằm trong khoảng từ 0 đến 99
    ]);

    // Kiểm tra nếu việc xác thực thất bại
    if ($validator->fails()) {
        return redirect()->route('du_thi.create')
            ->withErrors($validator)
            ->withInput();
    }

    // Kiểm tra xem học viên đã tham gia lịch thi nào khác chưa
    $existingExams = DuThi::whereIn('id_hoc_vien', [$request->id_hoc_vien_dau, $request->id_hoc_vien_cuoi])
        ->exists();

    // Nếu tìm thấy học viên đã tham gia lịch thi khác, chuyển hướng trở lại trang tạo với thông báo lỗi
    if ($existingExams) {
        return redirect()->route('du_thi.create')
            ->with('error', 'Mỗi học viên chỉ được tham gia một lịch thi duy nhất');
    }

    // Get prefix based on ung_dung_cntt for the first and last students
    $hocVienDau = HocVien::find($request->id_hoc_vien_dau);
    $prefixDau = ($hocVienDau->ung_dung_cntt == 'Cơ bản') ? 'CB' : 'NC';

    $hocVienCuoi = HocVien::find($request->id_hoc_vien_cuoi);
    $prefixCuoi = ($hocVienCuoi->ung_dung_cntt == 'Cơ bản') ? 'CB' : 'NC';

    // Initialize the current number for CB and NC
    $currentNumberCB = 1;
    $currentNumberNC = 1;

    // Loop through each student in the range and create DuThi instances
    for ($i = $request->id_hoc_vien_dau; $i <= $request->id_hoc_vien_cuoi; $i++) {
        // Kiểm tra xem học viên có ung_dung_cntt là 'Cơ bản' không
        $hocVien = HocVien::find($i);
        if ($hocVien && $hocVien->ung_dung_cntt == 'Cơ bản') {
            // Create a new DuThi instance
            $duThi = new DuThi();

            // Set common attributes
            $duThi->id_hoc_vien = $i;
            $duThi->id_lich_thi = $request->id_lich_thi;

            // Set So_bao_danh based on the student's order in the range for CB
            $soBaoDanhCB = $prefixDau . str_pad($request->so_giua, 2, "0", STR_PAD_LEFT) . str_pad($currentNumberCB, 3, "0", STR_PAD_LEFT);
            $duThi->So_bao_danh = $soBaoDanhCB;

            // Increment the current number for CB
            $currentNumberCB++;
        } elseif ($hocVien && $hocVien->ung_dung_cntt == 'Nâng cao') {
            // Set So_bao_danh based on the student's order in the range for NC
            $soBaoDanhNC = $prefixDau . str_pad($request->so_giua, 2, "0", STR_PAD_LEFT) . str_pad($currentNumberNC, 3, "0", STR_PAD_LEFT);
            $duThi->So_bao_danh = $soBaoDanhNC;

            // Increment the current number for NC
            $currentNumberNC++;
        }

        // Save the DuThi instance
        $duThi->save();
    }

    // Chuyển hướng đến trang phù hợp (ví dụ: index) hoặc trả về một phản hồi
    return redirect()->route('du_thi.index')->with('success', 'DuThi created successfully');
}
public function capnhatdiem($id_hoc_vien)
    {
        // Lấy danh sách học viên và gán vào biến $hocVienList
        $hocVienList = HocVien::where('ung_dung_cntt', 'Cơ bản')->get();

        // Lấy thông tin dự thi cần chỉnh sửa
        $duThi = DuThi::find($id_hoc_vien);

        // Lấy danh sách lịch thi
        $lichThiList = LichThi::all();

        // Trả về view edit.blade.php với các biến dữ liệu
        return view('du_thi.capnhatdiem', compact('hocVienList', 'duThi', 'lichThiList'));
    }

    public function ChamDiem(Request $request, $id_hoc_vien, $id_lich_thi)
    {
        // Validate the request data
        $request->validate([
            'diem_ly_thuyet' => 'nullable|numeric|min:0|max:10',
            'diem_thuc_hanh' => 'nullable|numeric|min:0|max:10',
        ]);

        // Retrieve the DuThi object
        $duThi = DuThi::where('id_hoc_vien', $id_hoc_vien)
                        ->where('id_lich_thi', $id_lich_thi)
                        ->firstOrFail();

        // Update the DuThi object with the request data
        $duThi->update([
            'diem_ly_thuyet' => $request->diem_ly_thuyet,
            'diem_thuc_hanh' => $request->diem_thuc_hanh,
            'trang_thai' => $this->determineStatus($request->diem_ly_thuyet, $request->diem_thuc_hanh),
        ]);

        // Redirect back to the edit page with a success message
        return redirect()->route('du_thi.index', [$duThi->id_hoc_vien, $duThi->id_lich_thi])
                         ->with('success', 'DuThi updated successfully');
    }

    private function determineStatus($diem_ly_thuyet, $diem_thuc_hanh)
    {
        // Check if both scores are not null and >= 5
    if ($diem_ly_thuyet !== null && $diem_thuc_hanh !== null && $diem_ly_thuyet >= 5 && $diem_thuc_hanh >= 5) {
        return 'Đã thi đạt';
    }

    // Check if any score is below 5 or either score is null
    if ($diem_ly_thuyet === null && $diem_thuc_hanh === null) {
        return 'Vắng thi';
    } elseif ($diem_ly_thuyet === null || $diem_thuc_hanh === null || $diem_ly_thuyet < 5 || $diem_thuc_hanh < 5) {
        return 'Đã thi không đạt';
    }

    // If both scores are null
    return 'Vắng thi';
}


    public function destroy($id_hoc_vien)
    {
        try {
            // Find and delete the DuThi instances with the given id_hoc_vien
            DuThi::where('id_hoc_vien', $id_hoc_vien)->delete();

            // Redirect to a relevant page (e.g., index) or return a response
            return redirect()->route('du_thi.index')->with('success', 'DuThi deleted successfully');
        } catch (\Exception $e) {
            // Handle any exceptions
            return redirect()->route('du_thi.index')->with('error', 'An error occurred while deleting DuThi');
        }
    }
    public function createNangCao()
{
    $hocVienList = HocVien::where('ung_dung_cntt', '!=', 'Cơ bản')->get(); // Lấy danh sách học viên nâng cao
    $lichThiList = LichThi::all(); // Lấy danh sách lịch thi
    return view('du_thi.create_nang_cao', compact('hocVienList', 'lichThiList'));
}

public function storeNangCao(Request $request)
{
    // Validate incoming request data
    $validator = Validator::make($request->all(), [
        'id_hoc_vien_dau' => 'required|exists:hoc_vien,id_hoc_vien', // Kiểm tra xem id_hoc_vien_dau có tồn tại trong bảng hoc_vien
        'id_hoc_vien_cuoi' => 'required|exists:hoc_vien,id_hoc_vien', // Kiểm tra xem id_hoc_vien_cuoi có tồn tại trong bảng hoc_vien
        'id_lich_thi' => 'required|exists:lich_thi,id_lich_thi', // Kiểm tra xem id_lich_thi có tồn tại trong bảng lich_thi
        'so_giua' => 'required|numeric|min:0|max:99', // Số giữa phải nằm trong khoảng từ 0 đến 99
    ]);

    // Kiểm tra nếu việc xác thực thất bại
    if ($validator->fails()) {
        return redirect()->route('du_thi.create_nang_cao')
            ->withErrors($validator)
            ->withInput();
    }

    // Kiểm tra xem học viên đã tham gia lịch thi nào khác chưa
    $existingExams = DuThi::whereIn('id_hoc_vien', [$request->id_hoc_vien_dau, $request->id_hoc_vien_cuoi])
        ->exists();

    // Nếu tìm thấy học viên đã tham gia lịch thi khác, chuyển hướng trở lại trang tạo với thông báo lỗi
    if ($existingExams) {
        return redirect()->route('du_thi.create_nang_cao')
            ->with('error', 'Mỗi học viên chỉ được tham gia một lịch thi duy nhất');
    }

    // Get prefix based on ung_dung_cntt for the first student
    $hocVienDau = HocVien::find($request->id_hoc_vien_dau);
    $prefixDau = ($hocVienDau->ung_dung_cntt == 'Cơ bản') ? 'CB' : 'NC';

    // Initialize the current number for NC
    $currentNumberNC = 1;

    // Loop through each student in the range and create DuThi instances
    for ($i = $request->id_hoc_vien_dau; $i <= $request->id_hoc_vien_cuoi; $i++) {
        // Kiểm tra xem học viên có ung_dung_cntt là 'Nâng cao' không
        $hocVien = HocVien::find($i);
        if ($hocVien && $hocVien->ung_dung_cntt == 'Nâng cao') {
            // Create a new DuThi instance
            $duThi = new DuThi();

            // Set common attributes
            $duThi->id_hoc_vien = $i;
            $duThi->id_lich_thi = $request->id_lich_thi;

            // Set So_bao_danh based on the student's order in the range for NC
            $soBaoDanhNC = $prefixDau . str_pad($request->so_giua, 2, "0", STR_PAD_LEFT) . str_pad($currentNumberNC, 3, "0", STR_PAD_LEFT);
            $duThi->So_bao_danh = $soBaoDanhNC;

            // Increment the current number for NC
            $currentNumberNC++;

            // Save the DuThi instance
            $duThi->save();
        }
    }

    // Redirect to a relevant page (e.g., index) or return a response
    return redirect()->route('du_thi.index')->with('success', 'DuThi created successfully');
}

}
