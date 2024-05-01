<?php

// app/Models/PhongThi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhongThi extends Model
{
    protected $table = 'phong_thi';

    protected $primaryKey = 'id_phong_thi';

    protected $fillable = [
        'ten_phong',
        'suc_chua',
        'so_may'
    ];

    public $timestamps = true;

}
