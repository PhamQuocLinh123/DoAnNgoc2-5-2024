<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MatKhauThiSinh;
use App\Models\HocVien;
use Illuminate\Support\Facades\Log; // Import Log facade
use Maatwebsite\Excel\Facades\Excel; // Import Excel facade
use App\Exports\PasswordsExport; // Import PasswordsExport class

class PasswordController extends Controller
{
    public function generatePassword()
    {
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = '';
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, $max)];
        }

        return $password;
    }

    public function createPasswordForAllStudents()
    {
        // Lấy tổng số học viên
        $totalStudents = HocVien::count();

        // Lấy số lượng mật khẩu đã được tạo ra
        $totalPasswords = MatKhauThiSinh::count();

        // Kiểm tra xem đã tạo đủ mật khẩu cho tất cả học viên hay chưa
        if ($totalStudents > 0 && $totalStudents === $totalPasswords) {
            return "Mật khẩu học viên đã được cấp đủ.";
        }

        // Lấy danh sách tất cả học viên
        $students = HocVien::all();

        foreach ($students as $student) {
            // Kiểm tra xem học viên đã có mật khẩu chưa
            $existingPassword = MatKhauThiSinh::where('id_hoc_vien', $student->id_hoc_vien)->exists();
            
            if (!$existingPassword) {
                // Nếu học viên chưa có mật khẩu, tạo mật khẩu mới
                $password = $this->generatePassword();

                // Tạo mật khẩu và lưu vào cơ sở dữ liệu
                $matKhauThiSinh = new MatKhauThiSinh;
                $matKhauThiSinh->id_hoc_vien = $student->id_hoc_vien;
                $matKhauThiSinh->mat_khau = $password;
                $matKhauThiSinh->save();
            }
        }

        return "Mật khẩu đã được tạo cho học viên chưa có mật khẩu.";
    }
    public function index()
    {
        // Lấy tất cả các mật khẩu của thí sinh
        $passwords = MatKhauThiSinh::all();

        // Hiển thị thông tin của từng mật khẩu
        return view('mat_khau.index', ['passwords' => $passwords]);
    }
    // Hàm xuất Excel dựa trên dữ liệu được cung cấp trong hàm index
    public function exportExcel()
    {
        // Lấy tất cả các mật khẩu của thí sinh
        $passwords = MatKhauThiSinh::with(['hocVien.khoaHoc', 'hocVien.nganh'])->get();

        // Gán các dữ liệu cần cho xuất Excel vào mảng
        $data = [];
        foreach ($passwords as $password) {
            $data[] = [
                'Tên học viên' => $password->hocVien->ho_ten,
                'Ảnh' => asset('anhhocvien/' . $password->hocVien->anh_3_4),
                'Số căn cước' => $password->hocVien->so_can_cuoc,
                'Ngày cấp căn cước' => $password->hocVien->ngay_cap_can_cuoc,
                'Nơi cấp căn cước' => $password->hocVien->noi_cap_can_cuoc,
                'Ngày sinh' => $password->hocVien->ngay_sinh,
                'Nơi sinh' => $password->hocVien->noi_sinh,
                'Dân tộc' => $password->hocVien->dan_toc,
                'Số điện thoại' => $password->hocVien->so_dien_thoai,
                'Khóa học' => $password->hocVien->khoaHoc ? $password->hocVien->khoaHoc->ten_khoa_hoc : 'Không có thông tin',
                'Ngành' => $password->hocVien->nganh ? $password->hocVien->nganh->ten_nganh : 'Học viên thuộc diện "Khác"',
                'Ngày đăng ký' => $password->hocVien->ngay_dang_ky,
                'Giới tính' => $password->hocVien->gioi_tinh,
                'Ứng dụng CNTT' => $password->hocVien->ung_dung_cntt,
                'Ghi chú' => $password->hocVien->ghi_chu,
                'Mật khẩu' => $password->mat_khau,
                'Ngày tạo' => $password->created_at,
                'Ngày cập nhật' => $password->updated_at,
            ];
        }

        // Tạo Excel từ dữ liệu và trả về file Excel
        return Excel::download(new PasswordsExport($data), 'passwords.xlsx');
    }
}
