@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Danh Sách Đợt Thi</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1 style="text-align: center">Danh Sách Đợt Thi</h1>
        <table id="dotThiTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Ngày Thi</th>
                    <th>Số Quyết Định Hội Đồng</th>
                    <th>Thao Tác </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dotThiEntries as $dotThi)
                <tr>
                    <td>{{ $dotThi->id_dot_thi }}</td>
                    <td>{{ $dotThi->ngay_thi }}</td>
                    <td>{{ $dotThi->so_quyet_dinh_hd }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('dot_thi.edit', $dotThi->id_dot_thi) }}">Cập Nhật</a>
                        <form style="display: inline-block;" method="POST" action="{{ route('dot_thi.destroy', $dotThi->id_dot_thi) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <a class="btn btn-success" href="{{ route('dot_thi.create') }}">Thêm Đợt Thi</a>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dotThiTable').DataTable({
                "paging": true,
                "searching": true
            });
        });
    </script>
</body>
</html>
@endsection