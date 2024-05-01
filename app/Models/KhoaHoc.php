<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhoaHoc extends Model
{
    use HasFactory;

    protected $table = 'khoa_hoc'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id_khoa_hoc'; // Tên primary key

    protected $fillable = [
        'ten_khoa_hoc',
    ];

    // Nếu bạn không muốn sử dụng các cột timestamp trong bảng, bạn có thể tắt chúng
    public $timestamps = true; // Thông thường, Laravel mong đợi các cột 'created_at' và 'updated_at' trong bảng
}
