@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Edit Phong Thi Entry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Phong Thi Entry</h1>
        <form method="POST" action="{{ route('phong_thi.update', $phongThiEntry->id_phong_thi) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ten_phong">Tên Phòng:</label>
                <input type="text" class="form-control" id="ten_phong" name="ten_phong" value="{{ $phongThiEntry->ten_phong }}">
            </div>
            <div class="form-group">
                <label for="suc_chua">Sức Chứa:</label>
                <input type="number" class="form-control" id="suc_chua" name="suc_chua" value="{{ $phongThiEntry->suc_chua }}">
            </div>
            <div class="form-group">
                <label for="so_may">Số Máy:</label>
                <input type="number" class="form-control" id="so_may" name="so_may" value="{{ $phongThiEntry->so_may }}">
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
@endsection