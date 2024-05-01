<!-- resources/views/nganh/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tạo mới ngành</h1>
    <!-- Form để tạo mới ngành -->
    <form method="POST" action="{{ route('nganh.store') }}">
        @csrf
        <div class="form-group">
            <label for="ten_nganh">Tên ngành:</label>
            <input type="text" class="form-control" id="ten_nganh" name="ten_nganh">
        </div>
        <button type="submit" class="btn btn-primary">Tạo mới</button>
    </form>
</div>
@endsection
