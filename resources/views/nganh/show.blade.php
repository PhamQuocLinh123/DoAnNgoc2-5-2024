<!-- resources/views/nganh/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thông tin chi tiết ngành</h1>
    <p>ID: {{ $nganh->id_nganh }}</p>
    <p>Tên ngành: {{ $nganh->ten_nganh }}</p>
    <a href="{{ route('nganh.edit', $nganh->id_nganh) }}" class="btn btn-warning">Sửa</a>
    <form action="{{ route('nganh.destroy', $nganh->id_nganh) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Xóa</button>
    </form>
</div>
@endsection
