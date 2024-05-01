<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HocVien extends Model
{
    protected $table = 'hoc_vien';

    protected $primaryKey = 'id_hoc_vien';

    protected $fillable = [
        'ho_ten',
        'anh_3_4',
        'so_can_cuoc',
        'ngay_cap_can_cuoc',
        'noi_cap_can_cuoc',
        'ngay_sinh',
        'noi_sinh',
        'dan_toc',
        'so_dien_thoai',
        'id_khoa_hoc',
        'id_nganh',
        'ngay_dang_ky',
        'gioi_tinh',
        'ung_dung_cntt',
        'ghi_chu',
    ];

    public function khoaHoc()
    {
        return $this->belongsTo('App\Models\KhoaHoc', 'id_khoa_hoc');
    }

    public function nganh()
    {
        return $this->belongsTo('App\Models\Nganh', 'id_nganh');
    }
}
