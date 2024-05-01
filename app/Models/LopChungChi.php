<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopChungChi extends Model
{
    use HasFactory;

    protected $table = 'lop_chung_chi';

    protected $primaryKey = 'id_lop';

    protected $fillable = [
        'ten_lop',
        'so_tiet',
        'hoc_phi'
    ];
}
