<?php

namespace App\Http\Controllers;

use App\Models\HocVien;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HocVienExport;

class ExcelController extends Controller
{
    public function exportHocVien()
    {
        return Excel::download(new HocVienExport, 'hoc_vien.xlsx');
    }
}
