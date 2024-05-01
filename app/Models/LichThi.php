<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichThi extends Model
{
    protected $table = 'lich_thi';

    protected $primaryKey = 'id_lich_thi';

    protected $fillable = [
        'id_dot_thi',
        'id_gio_thi',
        'id_phong_thi',
        'so_luong',
        // other fillable attributes
    ];

    // Define relationships
    public function dotThi()
    {
        return $this->belongsTo(DotThi::class, 'id_dot_thi');
    }

    public function gioThi()
    {
        return $this->belongsTo(GioThi::class, 'id_gio_thi');
    }

    public function phongThi()
    {
        return $this->belongsTo(PhongThi::class, 'id_phong_thi');
    }
}
