<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HocVien;
use App\Models\KhoaHoc;
use App\Models\Nganh;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\HocVienImport;
use Barryvdh\DomPDF\Facade as PDF;

class HocVienController extends Controller
{
    public function index()
    {
        $hocViens = HocVien::all();
        return view('hoc_vien.index', compact('hocViens'));
    }
    public function indexNangCao()
    {
        $hocViensNangCao = HocVien::where('ung_dung_cntt', 'Nâng cao')->get();
        return view('hoc_vien.index_nang_cao', compact('hocViensNangCao'));
    }

    public function indexCoBan()
    {
        $hocViensCoBan = HocVien::where('ung_dung_cntt', 'Cơ bản')->get();
        return view('hoc_vien.index_co_ban', compact('hocViensCoBan'));
    }

    public function create()
    {
        $khoaHocs = KhoaHoc::all();
        $nghanhs = Nganh::all();
        return view('hoc_vien.create', compact('khoaHocs', 'nghanhs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'id_khoa_hoc' => 'required|exists:khoa_hoc,id_khoa_hoc',
            'id_nganh' => 'required_if:id_khoa_hoc,Khác|nullable|exists:nganh,id_nganh',
            // Thêm các trường dữ liệu khác vào đây...
            'anh_3_4' => 'nullable|image|max:2048',
            'so_can_cuoc' => 'required|string|max:20',
            'ngay_cap_can_cuoc' => 'nullable|date',
            'noi_cap_can_cuoc' => 'nullable|string|max:255',
            'ngay_sinh' => 'nullable|date',
            'noi_sinh' => 'nullable|string|max:255',
            'dan_toc' => 'nullable|string|max:50',
            'so_dien_thoai' => 'nullable|string|max:15',
            'ngay_dang_ky' => 'nullable|string',
            'gioi_tinh' => 'nullable|string|in:Nam,Nữ,Khác',
            'ung_dung_cntt' => 'nullable|string|max:255',
            'ghi_chu' => 'nullable|string',
        ]);

        // Tiếp tục xử lý dữ liệu và lưu vào cơ sở dữ liệu
        $data = $request->only([
            'ho_ten', 'so_can_cuoc', 'ngay_cap_can_cuoc',
            'noi_cap_can_cuoc', 'ngay_sinh', 'noi_sinh', 'dan_toc',
            'so_dien_thoai', 'ngay_dang_ky', 'gioi_tinh', 'ung_dung_cntt',
            'ghi_chu'
        ]);

        $data['id_khoa_hoc'] = $request->input('id_khoa_hoc');
        $data['id_nganh'] = $request->input('id_nganh');

        // Xử lý tải lên ảnh nếu có
        if ($request->hasFile('anh_3_4') && $request->file('anh_3_4')->isValid()) {
            $imagePath = $request->file('anh_3_4')->store('', 'public');
            $data['anh_3_4'] = $imagePath;
        }

        // Tạo học viên mới và lưu vào cơ sở dữ liệu
        HocVien::create($data);

        return redirect()->route('hoc_vien.index');
    }

    public function show(HocVien $hocVien)
    {
        return view('hoc_vien.show', compact('hocVien'));
    }

    public function edit(HocVien $hocVien)
    {
        $khoaHocs = KhoaHoc::all();
        $nghanhs = Nganh::all();
        return view('hoc_vien.edit', compact('hocVien', 'khoaHocs', 'nghanhs'));
    }

    public function update(Request $request, HocVien $hocVien)
    {
        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'id_khoa_hoc' => 'nullable|exists:khoa_hoc,id_khoa_hoc',
            'id_nganh' => 'nullable|exists:nganh,id_nganh',
            // Thêm các trường dữ liệu khác vào đây...
            'anh_3_4' => 'nullable|image|max:2048',
            'so_can_cuoc' => 'required|string|max:20',
            'ngay_cap_can_cuoc' => 'nullable|date',
            'noi_cap_can_cuoc' => 'nullable|string|max:255',
            'ngay_sinh' => 'nullable|date',
            'noi_sinh' => 'nullable|string|max:255',
            'dan_toc' => 'nullable|string|max:50',
            'so_dien_thoai' => 'nullable|string|max:15',
            'ngay_dang_ky' => 'nullable|string',
            'gioi_tinh' => 'nullable|string|in:Nam,Nữ,Khác',
            'ung_dung_cntt' => 'nullable|string|max:255',
            'ghi_chu' => 'nullable|string',
        ]);

        // Lấy các giá trị mới từ request
        $data = $request->only([
            'ho_ten', 'so_can_cuoc', 'ngay_cap_can_cuoc',
            'noi_cap_can_cuoc', 'ngay_sinh', 'noi_sinh', 'dan_toc',
            'so_dien_thoai', 'ngay_dang_ky', 'gioi_tinh', 'ung_dung_cntt',
            'ghi_chu'
        ]);

        // Kiểm tra xem người dùng đã chọn giá trị mới cho id_khoa_hoc và id_nganh hay không
        if ($request->filled('id_khoa_hoc') && $request->filled('id_nganh')) {
            $data['id_khoa_hoc'] = $request->input('id_khoa_hoc');
            $data['id_nganh'] = $request->input('id_nganh');
        }

        // Xử lý tải lên ảnh nếu có
        if ($request->hasFile('anh_3_4') && $request->file('anh_3_4')->isValid()) {
            $imagePath = $request->file('anh_3_4')->store('', 'public');
            $data['anh_3_4'] = $imagePath;
        }

        // Cập nhật thông tin học viên với các giá trị mới
        $hocVien->update($data);

        return redirect()->route('hoc_vien.index');
    }

    public function destroy(HocVien $hocVien)
    {
        $hocVien->delete();
        return redirect()->route('hoc_vien.index');
    }
    public function import(Request $request)
    {
        // Kiểm tra và xác thực tập tin import
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        // Lấy đường dẫn tạm thời của tập tin
        $file = $request->file('file')->store('temp');

        // Import dữ liệu từ Excel vào cơ sở dữ liệu
        Excel::import(new HocVienImport, $file);

        // Xóa tập tin tạm thời sau khi import xong
        unlink(storage_path('app/'.$file));

        // Redirect về trang trước với thông báo thành công
        return redirect()->back()->with('success', 'Import thành công.');
    }
public function showImportForm()
{
    return view('hoc_vien.import');
}
public function exportPDF()
    {
        $hocViens = HocVien::all();

        $pdf = PDF::loadView('pdf.hoc-vien', compact('hocViens'));

        return $pdf->download('hoc-vien.pdf');
    }

}
