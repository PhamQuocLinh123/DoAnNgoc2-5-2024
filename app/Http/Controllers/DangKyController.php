<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DangKy;
use App\Models\HocVien;
use App\Models\LopChungChi;

class DangKyController extends Controller
{
    public function index()
    {
        $lops = LopChungChi::all();
        return view('dangky.index', compact('lops'));
    }
    public function createCoBan()
    {
        $hocViensCoBan = HocVien::where('ung_dung_cntt', 'Cơ bản')->get();
        $lopChungChis = LopChungChi::all();
        
        return view('dangky.create_co_ban', compact('hocViensCoBan', 'lopChungChis'));
    }

    public function createNangCao()
    {
        $hocViensNangCao = HocVien::where('ung_dung_cntt', 'Nâng cao')->get();
        $lopChungChis = LopChungChi::all();
        
        return view('dangky.create_nang_cao', compact('hocViensNangCao', 'lopChungChis'));
    }

    public function store(Request $request)
{
    // Validate dữ liệu đầu vào từ request
    $request->validate([
        'id_hoc_vien' => 'required|array',
        'id_hoc_vien.*' => 'exists:hoc_vien,id_hoc_vien',
        'id_lop' => 'required|exists:lop_chung_chi,id_lop',
        'trang_thai_phi.*' => 'nullable|string|max:50',
    ]);

    // Lặp qua danh sách các học viên được chọn
    foreach ($request->id_hoc_vien as $idHocVien) {
        // Kiểm tra xem học viên đã đăng ký vào lớp nào chưa
        $existingRegistration = DangKy::where('id_hoc_vien', $idHocVien)->first();

        // Nếu học viên đã có đăng ký
        if ($existingRegistration) {
            // Redirect với thông báo lỗi
            return redirect()->back()->with('error', 'Học viên đã có lớp, không thể đăng ký vào lớp mới.');
        }

        // Nếu học viên chưa có đăng ký, tiếp tục lưu đăng ký mới
        $dangKy = new DangKy();
        $dangKy->id_hoc_vien = $idHocVien;
        $dangKy->id_lop = $request->id_lop;
        $dangKy->trang_thai_phi = $request->trang_thai_phi[$idHocVien]; // Lấy trạng thái học phí theo id của học viên
        $dangKy->save();
    }

    // Redirect về trang trước và gửi thông báo thành công (nếu cần)
    return redirect()->back()->with('success', 'Đã đăng ký thành công.');
}

public function showByLop($id_lop)
{
    // Lấy thông tin của lớp chứng chỉ
    $lopChungChi = LopChungChi::findOrFail($id_lop);

    // Lấy danh sách đăng ký dựa trên id_lop
    $registrations = DangKy::where('id_lop', $id_lop)->get();

    // Truyền danh sách đăng ký, id_lop và thông tin lớp tới view
    return view('dangky.show_by_lop', compact('registrations', 'lopChungChi'));
}
// Các phương thức hiện có (index, createCoBan, createNangCao, store, showByLop) đã được bao gồm ở trên

    // Phương thức hiển thị form sửa đăng ký
    public function edit($id)
    {
        // Lấy thông tin của đăng ký cần sửa
        $registration = DangKy::findOrFail($id);
        return view('dangky.edit', compact('registration'));
    }

    // Phương thức cập nhật đăng ký sau khi sửa
    public function update(Request $request, $id)
    {
        // Validate dữ liệu đầu vào từ request
        $request->validate([
            'trang_thai_phi' => 'nullable|string|max:50',
        ]);

        // Tìm đăng ký cần sửa
        $registration = DangKy::findOrFail($id);
        // Cập nhật thông tin
        $registration->trang_thai_phi = $request->input('trang_thai_phi');
        $registration->save();

        // Redirect về trang danh sách và gửi thông báo thành công
        return redirect()->route('dangky.index')->with('success', 'Đã cập nhật thành công.');
    }

    // Phương thức xóa đăng ký
    public function destroy($id)
    {
        // Tìm và xóa đăng ký
        $registration = DangKy::findOrFail($id);
        $registration->delete();

        // Redirect về trang danh sách và gửi thông báo xóa thành công
        return redirect()->route('dangky.index')->with('success', 'Đã xóa thành công.');
    }

}
