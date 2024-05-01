@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>List of Phong Thi Entries</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1>List of Phong Thi Entries</h1>
    <table id="phongThiTable" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Phòng</th>
                <th>Sức Chứa</th>
                <th>Số Máy</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($phongThiEntries as $phongThi)
            <tr>
                <td>{{ $phongThi->id_phong_thi }}</td>
                <td>{{ $phongThi->ten_phong }}</td>
                <td>{{ $phongThi->suc_chua }}</td>
                <td>{{ $phongThi->so_may }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('phong_thi.edit', $phongThi->id_phong_thi) }}">Edit</a>
                    <form style="display: inline-block;" method="POST" action="{{ route('phong_thi.destroy', $phongThi->id_phong_thi) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a class="btn btn-success" href="{{ route('phong_thi.create') }}">Add New Phong Thi Entry</a>

    <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#phongThiTable').DataTable({
                "paging": true,
                "searching": true
            });
        });
    </script>
</body>
</html>
@endsection