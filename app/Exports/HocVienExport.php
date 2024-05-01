<?php

namespace App\Exports;

use App\Models\HocVien;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HocVienExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return HocVien::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Họ và tên',
            'Ảnh 3/4',
            'Số căn cước',
            'Ngày cấp căn cước',
            'Nơi cấp căn cước',
            'Ngày sinh',
            'Nơi sinh',
            'Dân tộc',
            'Số điện thoại',
            'ID khóa học',
            'ID ngành',
            'Ngày đăng ký',
            'Giới tính',
            'Ứng dụng CNTT',
            'Ghi chú',
        ];
    }
}
