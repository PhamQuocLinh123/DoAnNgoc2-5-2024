@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Create Phong Thi Entry</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Create Phong Thi Entry</h1>
        <form action="{{ route('gio_thi.store') }}" method="POST">


            @csrf
            <div class="form-group">
                <label for="ten_phong">Tên Phòng:</label>
                <input type="text" class="form-control" id="ten_phong" name="ten_phong" value="{{ old('ten_phong') }}">
            </div>
            <div class="form-group">
                <label for="suc_chua">Sức Chứa:</label>
                <input type="number" class="form-control" id="suc_chua" name="suc_chua" value="{{ old('suc_chua') }}">
            </div>
            <div class="form-group">
                <label for="so_may">Số Máy:</label>
                <input type="number" class="form-control" id="so_may" name="so_may" value="{{ old('so_may') }}">
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
@endsection