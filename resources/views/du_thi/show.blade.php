<!-- resources/views/du_thi/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">DuThi Details</div>

                    <div class="card-body">
                        <p><strong>Hoc Vien ID:</strong> {{ $duThi->id_hoc_vien }}</p>
                        <p><strong>Lich Thi ID:</strong> {{ $duThi->id_lich_thi }}</p>
                        <p><strong>Trang Thai:</strong> {{ $duThi->trang_thai }}</p>
                        <p><strong>Diem Ly Thuyet:</strong> {{ $duThi->diem_ly_thuyet }}</p>
                        <p><strong>Diem Thuc Hanh:</strong> {{ $duThi->diem_thuc_hanh }}</p>
                        <p><strong>So Bao Danh:</strong> {{ $duThi->So_bao_danh }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
