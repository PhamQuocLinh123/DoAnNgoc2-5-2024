@extends('layouts.app')

@section('content')
    <h1>Chỉnh sửa thông tin lớp</h1>
    <form action="{{ route('lops.update', $lop->id_lop) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ten_lop">Tên lớp</label>
            <input type="text" class="form-control" id="ten_lop" name="ten_lop" value="{{ $lop->ten_lop }}">
        </div>
        <div class="form-group">
            <label for="so_tiet">Số tiết</label>
            <input type="number" class="form-control" id="so_tiet" name="so_tiet" value="{{ $lop->so_tiet }}">
        </div>
        <div class="form-group">
            <label for="hoc_phi">Học phí</label>
            <input type="number" step="0.01" class="form-control" id="hoc_phi" name="hoc_phi" value="{{ $lop->hoc_phi }}">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
