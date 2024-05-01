<?php

namespace App\Exports;

use Illuminate\Support\Facades\Log; // Import Log facade
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Events\AfterSheet;

class PasswordsExport implements FromArray, WithHeadings, WithStyles
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Tên học viên',
            'Ảnh',
            'Số căn cước',
            'Ngày cấp căn cước',
            'Nơi cấp căn cước',
            'Ngày sinh',
            'Nơi sinh',
            'Dân tộc',
            'Số điện thoại',
            'Khóa học',
            'Ngành',
            'Ngày đăng ký',
            'Giới tính',
            'Ứng dụng CNTT',
            'Ghi chú',
            'Mật khẩu',
            'Ngày tạo',
            'Ngày cập nhật',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the header row
            1 => [
                'font' => ['color' => ['argb' => 'FFFFFFFF'], 'bold' => true],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                'fill' => ['fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR, 'rotation' => 90, 'startColor' => ['argb' => 'FF0000FF'], 'endColor' => ['argb' => 'FF0000FF']]
            ],
            // Style the data rows
            'A:R' => [
                'font' => ['bold' => false],
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT],
            ],
            // Add borders to the table
            'A1:R' . ($sheet->getHighestRow()) => [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => 'FF000000'],
                    ],
                ],
            ],
        ];
    }

    // Add custom header
    public function registerEvents(): array
{
    return [
        AfterSheet::class => function(AfterSheet $event) {
            // Merge cells for the custom header
            $event->sheet->mergeCells('A1:R1');
            $event->sheet->mergeCells('A2:R2');
            $event->sheet->mergeCells('A3:R3');
            $event->sheet->mergeCells('A4:R4');
            $event->sheet->mergeCells('A5:R5');
            $event->sheet->mergeCells('A6:R6');

            // Set alignment for the custom header
            $event->sheet->getStyle('A1:R6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $event->sheet->getStyle('A1:R6')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

            // Set font size and bold for the custom header
            $event->sheet->getStyle('A1:R6')->getFont()->setSize(14)->setBold(true);

            // Set university information
            $event->sheet->setCellValue('A1', 'TRƯỜNG ĐẠI HỌC CỬU LONG CỘNG HOÀ XÃ HỘI CHỦ NGHĨA VIỆT NAM');
            $event->sheet->setCellValue('A2', 'BAN TỔ CHỨC HỘI THAO');
            $event->sheet->setCellValue('A3', 'Độc lập - Tự do - Hạnh phúc');
            $event->sheet->setCellValue('A4', '');
            $event->sheet->setCellValue('A5', 'Vĩnh Long, ngày      tháng       năm 2023');
            $event->sheet->setCellValue('A6', 'DANH SÁCH ĐĂNG KÝ THAM GIA');

            // Set font style for university information
            $event->sheet->getStyle('A1:A3')->getFont()->setSize(12)->setBold(true);
            $event->sheet->getStyle('A5:A6')->getFont()->setSize(12)->setBold(true);
            
            // Merge cells for additional information
            $event->sheet->mergeCells('A7:R7');

            // Set additional information
            $event->sheet->setCellValue('A7', 'Môn bóng chuyền hơi Nữ');
            $event->sheet->setCellValue('A8', 'Chào mừng kỷ niệm 41 năm ngày Nhà giáo Việt Nam');
            $event->sheet->setCellValue('A9', '(20/11/1982 – 20/11/2023) rồi mới tới bảng excel này');

            // Set font style for additional information
            $event->sheet->getStyle('A7:A9')->getFont()->setSize(12)->setBold(true);
        },
    ];
}


}
