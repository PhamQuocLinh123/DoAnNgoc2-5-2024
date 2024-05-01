<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DangKy extends Model
{
    protected $table = 'dang_ky'; // Tên của bảng trong cơ sở dữ liệu

    protected $primaryKey = ['id_hoc_vien', 'id_lop']; // Khóa chính là sự kết hợp của hai trường

    public $incrementing = false; // Khóa chính không tự động tăng

    protected $fillable = [
        'id_hoc_vien',
        'id_lop',
        'trang_thai_phi'
    ]; // Các trường có thể được gán bằng phương thức create()

    // Mối quan hệ: Một đăng ký thuộc về một học viên
    public function hocVien()
    {
        return $this->belongsTo(HocVien::class, 'id_hoc_vien', 'id_hoc_vien');
    }

    // Mối quan hệ: Một đăng ký thuộc về một lớp chứng chỉ
    public function lopChungChi()
    {
        return $this->belongsTo(LopChungChi::class, 'id_lop', 'id_lop');
    }
}
