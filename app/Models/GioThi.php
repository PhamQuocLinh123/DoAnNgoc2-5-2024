<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioThi extends Model
{
    use HasFactory;

    protected $table = 'gio_thi'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id_gio_thi'; // Tên trường khóa chính

    protected $fillable = [
        'gio_bat_dau',
        'gio_ket_thuc',
    ];
    public $timestamps = true; // Bật cờ sử dụng timestamps

    protected $dates = ['created_at', 'updated_at']; // Các trường ngày tháng
}
