@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Học Viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .card {
            border: 2px solid #0069d9;
            border-radius: 10px;
            margin-top: 20px;
        }

        .card-header {
            background-color: #0069d9;
            color: #fff;
            text-align: center;
            font-weight: bold;
            padding: 10px 0;
            border-bottom: 2px solid #0056b3;
            border-radius: 8px 8px 0 0;
        }

        .card-body {
            background-color: #fff;
        }

        img {
            max-width: 150px;
            height: auto;
            border-radius: 8px;
        }

        .table th,
        .table td {
            font-size: 14px;
            vertical-align: middle;
        }

        .table th {
            width: 30%;
            background-color: #f8f9fa;
            font-weight: normal;
            border-top: none;
        }

        .table td {
            border-top: none;
        }

        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thông Tin Học Viên</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('anhhocvien/' . $hocVien->anh_3_4) }}" alt="Ảnh học viên" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">Họ và Tên</th>
                                        <td>{{ $hocVien->ho_ten }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ứng Dụng CNTT</th>
                                        <td>{{ $hocVien->ung_dung_cntt }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ngày Sinh</th>
                                        <td>{{ $hocVien->ngay_sinh }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nơi Sinh</th>
                                        <td>{{ $hocVien->noi_sinh }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Giới Tính</th>
                                        <td>{{ $hocVien->gioi_tinh }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Số Căn Cước</th>
                                        <td>{{ $hocVien->so_can_cuoc }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ngày Cấp Căn Cước</th>
                                        <td>{{ $hocVien->ngay_cap_can_cuoc }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nơi Cấp Căn Cước</th>
                                        <td>{{ $hocVien->noi_cap_can_cuoc }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">Dân Tộc</th>
                                        <td>{{ $hocVien->dan_toc }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Số Điện Thoại</th>
                                        <td>{{ $hocVien->so_dien_thoai }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Khoá Học</th>
                                        <td>{{ $hocVien->khoaHoc->ten_khoa_hoc }}</td>
                                    </tr>
                                    @if ($hocVien->nganh)
                                    <tr>
                                        <th scope="row">Ngành Học</th>
                                        <td>{{ $hocVien->nganh->ten_nganh }}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th scope="row">Ngày Đăng Ký</th>
                                        <td>{{ $hocVien->ngay_dang_ky }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <th scope="row">Ghi Chú</th>
                                        <td>{{ $hocVien->ghi_chu }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

</body>
</html>


@endsection
