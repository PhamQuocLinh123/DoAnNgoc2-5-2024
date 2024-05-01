@extends('layouts.app')

@section('content')
    <h1>Thông tin lớp</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $lop->id_lop }}</td>
        </tr>
        <tr>
            <th>Tên lớp</th>
            <td>{{ $lop->ten_lop }}</td>
        </tr>
        <tr>
            <th>Số tiết</th>
            <td>{{ $lop->so_tiet }}</td>
        </tr>
        <tr>
            <th>Học phí</th>
            <td>{{ $lop->hoc_phi }}</td>
        </tr>
    </table>
    <a href="{{ route('lops.index') }}" class="btn btn-secondary">Quay lại</a>
@endsection
