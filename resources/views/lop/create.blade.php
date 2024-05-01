@extends('layouts.app')

@section('content')
    <h1>Tạo lớp mới</h1>
    <form action="{{ route('lops.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ten_lop">Tên lớp</label>
            <input type="text" class="form-control" id="ten_lop" name="ten_lop">
        </div>
        <div class="form-group">
            <label for="so_tiet">Số tiết</label>
            <input type="number" class="form-control" id="so_tiet" name="so_tiet">
        </div>
        <div class="form-group">
            <label for="hoc_phi">Học phí</label>
            <input type="number" step="0.01" class="form-control" id="hoc_phi" name="hoc_phi">
        </div>
        <button type="submit" class="btn btn-primary">Tạo lớp</button>
    </form>
@endsection
