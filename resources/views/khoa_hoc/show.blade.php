@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Thông tin chi tiết khóa học</h1>

    <p><strong>ID:</strong> {{ $khoaHoc->id_khoa_hoc }}</p>
    <p><strong>Tên khóa học:</strong> {{ $khoaHoc->ten_khoa_hoc }}</p>
</div>
@endsection