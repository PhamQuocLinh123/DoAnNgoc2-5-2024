@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đăng ký</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="mt-5 mb-4">Danh sách đăng ký theo lớp</h2>
        <table id="registrationTable" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Học viên</th>
                    <th scope="col">Lớp</th>
                    <th scope="col">Trạng thái phí</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $index => $registration)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $registration->hocVien ? $registration->hocVien->ho_ten : 'Không có thông tin' }}</td>
                        <td>{{ $registration->lopChungChi->ten_lop }}</td>
                        <td>{{ $registration->trang_thai_phi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#registrationTable').DataTable({
                "paging": true, // Cho phép phân trang
                "searching": true // Cho phép tìm kiếm
            });
        });
    </script>
</body>
</html>
@endsection