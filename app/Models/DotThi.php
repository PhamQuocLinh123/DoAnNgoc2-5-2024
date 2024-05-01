<?php

// app/Models/DotThi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DotThi extends Model
{
    protected $table = 'dot_thi';

    protected $primaryKey = 'id_dot_thi';

    protected $fillable = [
        'ngay_thi',
        'so_quyet_dinh_hd',
    ];
    public $timestamps = true; // Bật cờ sử dụng timestamps

    protected $dates = ['created_at', 'updated_at']; // Các trường ngày tháng

    // You can define relationships, accessors, mutators, and other methods here
}

    

