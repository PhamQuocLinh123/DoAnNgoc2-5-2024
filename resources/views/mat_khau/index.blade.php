<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passwords</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <style>
        /* CSS for table */
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th, td {
            border: 1px solid #070707;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fdfdfd;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e2e6ea;
        }

        /* CSS for page */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }

        h1 {
            color: #007bff;
            margin-bottom: 30px;
        }

        /* CSS for DataTables */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 10px 16px;
            margin-left: 5px;
            border-radius: 3px;
            border: none;
            cursor: pointer;
            color: #fff !important;
            background-color: #007bff;
            transition: background-color 0.3s;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #0056b3;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #0056b3;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            cursor: not-allowed;
            color: #6c757d !important;
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <h1>Passwords</h1>
    <div class="col-md-6">
        <!-- Select box for filtering by 'Ứng dụng CNTT' -->
        <div class="dataTables_length" id="applicationsFilter">
            <label>Ứng dụng CNTT:
                <select class="custom-select custom-select-sm" id="applicationsSelect">
                    <option value="">Tất cả</option>
                    <option value="Nâng cao">Nâng cao</option>
                    <option value="Cơ bản">Cơ bản</option>
                </select>
            </label>
        </div>
    </div>
    <div class="col-md-6">
            <a href="{{ route('export.excel') }}" class="btn btn-primary">Export Excel</a>
    </div>

    <table id="passwordsTable" class="table">
        <thead>
            <tr>
                <th>Tên học viên</th>
                <th>Ảnh</th>
                <th>Số căn cước</th>
                <th>Ngày cấp căn cước</th>
                <th>Nơi cấp căn cước</th>
                <th>Ngày sinh</th>
                <th>Nơi sinh</th>
                <th>Dân tộc</th>
                <th>Số điện thoại</th>
                <th>Khóa học</th>
                <th>Ngành</th>
                <th>Ngày đăng ký</th>
                <th>Giới tính</th>
                <th>Ứng dụng CNTT</th>
                <th>Ghi chú</th>
                <th>Mật khẩu</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($passwords as $password)
                <tr>
                    <td>{{ $password->hocVien->ho_ten }}</td>
                    <td>
                        <img src="{{ asset('anhhocvien/' . $password->hocVien->anh_3_4) }}" alt="Ảnh học viên" class="img-fluid">
                    </td>
                    
                    <td>{{ $password->hocVien->so_can_cuoc }}</td>
                    <td>{{ $password->hocVien->ngay_cap_can_cuoc }}</td>
                    <td>{{ $password->hocVien->noi_cap_can_cuoc }}</td>
                    <td>{{ $password->hocVien->ngay_sinh }}</td>
                    <td>{{ $password->hocVien->noi_sinh }}</td>
                    <td>{{ $password->hocVien->dan_toc }}</td>
                    <td>{{ $password->hocVien->so_dien_thoai }}</td>
                    <td>
                        @if ($password->hocVien->khoaHoc)
                            {{ $password->hocVien->khoaHoc->ten_khoa_hoc }}
                        @else
                            Không có thông tin
                        @endif
                    </td>
                    
                    <td>
                        @if ($password->hocVien->nganh)
                            {{ $password->hocVien->nganh->ten_nganh }}
                        @else
                            Học viên thuộc diện "Khác"
                        @endif
                    </td>
                    <td>{{ $password->hocVien->ngay_dang_ky }}</td>
                    <td>{{ $password->hocVien->gioi_tinh }}</td>
                    <td>{{ $password->hocVien->ung_dung_cntt }}</td>
                    <td>{{ $password->hocVien->ghi_chu }}</td>
                    <td>{{ $password->mat_khau }}</td>
                    <td>{{ $password->created_at }}</td>
                    <td>{{ $password->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
    var table = $('#passwordsTable').DataTable({
        "paging": true,
        "searching": true
    });
    
    // Sự kiện thay đổi giá trị của select box
    $('#applicationsSelect').on('change', function() {
        var value = $(this).val();
        table.column(13).search(value ? '^' + $(this).val() + '$' : '', true, false).draw();
    });
});

    </script>
</body>
</html>
