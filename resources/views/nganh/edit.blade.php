<!-- resources/views/nganh/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chỉnh sửa thông tin ngành</h1>
    <!-- Form để chỉnh sửa thông tin ngành -->
    <form method="POST" action="{{ route('nganh.update', $nganh->id_nganh) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ten_nganh">Tên ngành:</label>
            <input type="text" class="form-control" id="ten_nganh" name="ten_nganh" value="{{ $nganh->ten_nganh }}">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
