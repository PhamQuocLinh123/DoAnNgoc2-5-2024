@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Đợt Thi</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5" style="text-align: center">Thêm Đợt Thi</h1>
        <form method="POST" action="{{ route('dot_thi.store') }}">
            @csrf
            <div class="form-group">
                <label for="ngay_thi">Ngày Thi:</label>
                <input type="date" class="form-control" id="ngay_thi" name="ngay_thi">
            </div>
            <div class="form-group">
                <label for="so_quyet_dinh_hd">Số Quyết Định HD:</label>
                <input type="text" class="form-control" id="so_quyet_dinh_hd" name="so_quyet_dinh_hd">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
</body>
</html>
@endsection