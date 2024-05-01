@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Sửa thông tin khóa học</h1>

    <form action="{{ route('khoa_hoc.update', $khoaHoc->id_khoa_hoc) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ten_khoa_hoc">Tên khóa học:</label>
            <input type="text" class="form-control" id="ten_khoa_hoc" name="ten_khoa_hoc" value="{{ $khoaHoc->ten_khoa_hoc }}">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
