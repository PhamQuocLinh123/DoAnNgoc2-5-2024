<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DuThi extends Model
{
    protected $table = 'du_thi';

    protected $primaryKey = 'id_hoc_vien'; // Hoặc 'id_hoc_vien', hoặc 'id_lich_thi', tùy thuộc vào ý định của bạn

    protected $fillable = [
        'id_hoc_vien',
        'id_lich_thi',
        'trang_thai',
        'diem_ly_thuyet',
        'diem_thuc_hanh',
        'So_bao_danh',
    ];

    public $timestamps = true; 

    protected $dates = ['created_at', 'updated_at']; 

    public function hocVien()
    {
        return $this->belongsTo('App\Models\HocVien', 'id_hoc_vien');
    }

    public function lichThi()
    {
        return $this->belongsTo('App\Models\LichThi', 'id_lich_thi');
    }
}
