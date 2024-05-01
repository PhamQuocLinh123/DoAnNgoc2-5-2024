@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm mới khóa học</h1>

    <form action="{{ route('khoa_hoc.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ten_khoa_hoc">Tên khóa học:</label>
            <input type="text" class="form-control" id="ten_khoa_hoc" name="ten_khoa_hoc" placeholder="Nhập tên khóa học">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection