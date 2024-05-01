<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    use HasFactory;

    protected $table = 'nganh'; // Tên bảng trong cơ sở dữ liệu

    protected $primaryKey = 'id_nganh'; // Khóa chính của bảng

    protected $fillable = ['ten_nganh']; // Các trường có thể được gán bằng mass assignment

    // Không cần phương thức này nếu bạn không cần timestamps
    public $timestamps = true;
}
