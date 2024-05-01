@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CẬP NHẬT ĐỢT THI</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5" style="text-align: center">CẬP NHẬT ĐỢT THI</h1>
        <form method="POST" action="{{ route('dot_thi.update', $dotThiEntry->id_dot_thi) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ngay_thi">Ngày Thi:</label>
                <input type="date" class="form-control" id="ngay_thi" name="ngay_thi" value="{{ $dotThiEntry->ngay_thi }}">
            </div>
            <div class="form-group">
                <label for="so_quyet_dinh_hd">Số Quyết Định HD:</label>
                <input type="text" class="form-control" id="so_quyet_dinh_hd" name="so_quyet_dinh_hd" value="{{ $dotThiEntry->so_quyet_dinh_hd }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection