@extends('layouts.app')

@section('content')
<style>
    /* CSS for select box */
.form-select {
    /* Tùy chỉnh độ rộng và độ cao của select box */
    width: 100%;
    height: 38px;

    /* Thiết lập đường viền */
    border: 1.5px solid #1606f9;
    border-radius: 4px;

    /* Thiết lập màu nền và màu chữ */
    background-color: #fff;
    color: #080808;

    /* Thiết lập padding và margin */
    padding: .375rem .75rem;
    margin-bottom: 1rem;

    /* Thiết lập cursor khi di chuyển vào select box */
    cursor: pointer;
}

/* CSS for option list */
.form-select option {
    /* Thiết lập màu nền và màu chữ của option */
    background-color: #fff;
    color: #0e0e0e;
}

</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Danh sách học viên nâng cao</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <select class="form-select" onchange="location = this.value;">
                                <option selected disabled>Lọc Học Viên</option>
                                <option value="{{ route('hoc_vien.index_co_ban') }}">Học viên cơ bản</option>
                                <option value="{{ route('hoc_vien.index_nang_cao') }}">Học viên nâng cao</option>
                                <option value="{{ route('hoc_vien.index') }}">Tổng học viên </option>
                            </select>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (count($hocViensNangCao) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Họ và Tên</th>
                                        <th>Số Căn Cước</th>
                                        <th>Ngày Đăng Ký</th>
                                        <th>Thao Tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hocViensNangCao as $hocVien)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $hocVien->ho_ten }}</td>
                                            <td>{{ $hocVien->so_can_cuoc }}</td>
                                            <td>{{ $hocVien->ngay_dang_ky }}</td>
                                            <td>
                                                <a href="{{ route('hoc_vien.show', $hocVien->id_hoc_vien) }}" class="btn btn-info">Xem</a>
                                                <a href="{{ route('hoc_vien.edit', $hocVien->id_hoc_vien) }}" class="btn btn-primary">Sửa</a>
                                                <form action="{{ route('hoc_vien.destroy', $hocVien->id_hoc_vien) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa học viên này không?')">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>Không có học viên nâng cao.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
