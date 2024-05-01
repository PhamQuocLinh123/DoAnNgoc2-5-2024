@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chấm Điểm</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('du_thi.chamdiem', [$duThi->id_hoc_vien, $duThi->id_lich_thi]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="diem_ly_thuyet">Diem Ly Thuyet</label>
                            <input type="number" class="form-control" id="diem_ly_thuyet" name="diem_ly_thuyet" min="0" max="10" value="{{ old('diem_ly_thuyet', $duThi->diem_ly_thuyet) }}">
                        </div>

                        <div class="form-group">
                            <label for="diem_thuc_hanh">Diem Thuc Hanh</label>
                            <input type="number" class="form-control" id="diem_thuc_hanh" name="diem_thuc_hanh" min="0" max="10" value="{{ old('diem_thuc_hanh', $duThi->diem_thuc_hanh) }}">
                        </div>

                        




                        <button type="submit" class="btn btn-primary">Chấm Điểm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
