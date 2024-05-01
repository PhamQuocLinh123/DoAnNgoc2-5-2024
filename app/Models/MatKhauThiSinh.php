<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatKhauThiSinh extends Model
{
    use HasFactory;

    protected $table = 'mat_khau_thi_sinh';
    protected $primaryKey = 'id_mat_khau';
    protected $fillable = ['id_hoc_vien', 'mat_khau'];
    public $timestamps = true;
    
    // Không cần khai báo các cột timestamps, Laravel tự động quản lý chúng.

    // Xác định mối quan hệ với bảng hoc_vien
    public function hocVien()
    {
        return $this->belongsTo(HocVien::class, 'id_hoc_vien');
    }
}
