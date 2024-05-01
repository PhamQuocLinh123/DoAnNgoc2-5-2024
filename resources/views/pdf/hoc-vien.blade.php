<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Học viên</title>
    <style>
        /* Bổ sung CSS cho định dạng file PDF nếu cần */
    </style>
</head>
<body>
    <h1>Danh sách Học viên</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Họ và tên</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <!-- Bổ sung các cột khác nếu cần -->
            </tr>
        </thead>
        <tbody>
            @foreach($hocViens as $hocVien)
                <tr>
                    <td>{{ $hocVien->ho_ten }}</td>
                    <td>{{ $hocVien->ngay_sinh }}</td>
                    <td>{{ $hocVien->noi_sinh }}</td>
                    <td>{{ $hocVien->so_dien_thoai }}</td>
                    <!-- Hiển thị các thông tin khác của học viên -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
