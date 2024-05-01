@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Học Viên Mới</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    padding-top: 20px;
}

.card {
    border: 2px solid #0069d9;
    border-radius: 10px;
    margin-top: 20px;
}

.card-header {
    background-color: #0069d9;
    color: #fff;
    text-align: center;
    font-weight: bold;
    padding: 10px 0;
    border-bottom: 2px solid #0056b3;
    border-radius: 8px 8px 0 0;
}

.card-body {
    background-color: #fff;
}

img {
    max-width: 150px;
    height: auto;
    border-radius: 8px;
}

.table th,
.table td {
    font-size: 14px;
    vertical-align: middle;
}

.table th {
    width: 30%;
    background-color: #f8f9fa;
    font-weight: normal;
    border-top: none;
}

.table td {
    border-top: none;
}

.btn-back {
    margin-top: 20px;
}

/* Hiển thị nút radio và label cùng một dòng */
.form-check-inline .form-check-input {
    margin-top: 0;
}

.form-check-inline .form-check-label {
    margin-left: 10px;
}

/* Hiển thị viền cho input */
.form-control {
    border: 1.2px solid #020202;
}

/* Hiển thị nút chọn của radio button */
.form-check-input[type=radio] {
    border: 1.2px solid #0a0a0a;
}

/* Định dạng form */
.form-group {
    margin-bottom: 20px;
}

.form-row {
    margin-bottom: 20px;
}

.form-group label {
    font-weight: bold;
}

textarea {
    resize: vertical;
}

    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Sửa Thông Tin Học Viên</h1>
        </div>
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

            <form action="{{ route('hoc_vien.update', $hocVien->id_hoc_vien) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="ho_ten">Họ và tên:</label>
                    <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="{{ old('ho_ten', $hocVien->ho_ten) }}" required>
                </div>

                <div class="form-group">
                    <label for="anh_3_4">Ảnh 3x4:</label>
                    <input type="file" class="form-control-file" id="anh_3_4" name="anh_3_4">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="so_can_cuoc">Số căn cước công dân:</label>
                        <input type="text" class="form-control" id="so_can_cuoc" name="so_can_cuoc" value="{{ old('so_can_cuoc', $hocVien->so_can_cuoc) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="ngay_cap_can_cuoc">Ngày cấp căn cước công dân:</label>
                        <input type="date" class="form-control" id="ngay_cap_can_cuoc" name="ngay_cap_can_cuoc" value="{{ old('ngay_cap_can_cuoc', $hocVien->ngay_cap_can_cuoc) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="noi_cap_can_cuoc">Nơi cấp căn cước công dân:</label>
                        <input type="text" class="form-control" id="noi_cap_can_cuoc" name="noi_cap_can_cuoc" value="{{ old('noi_cap_can_cuoc', $hocVien->noi_cap_can_cuoc) }}">
                    </div>
                    <div class="form-group">
                        <label for="ngay_sinh">Ngày sinh:</label>
                        <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="{{ old('ngay_sinh', $hocVien->ngay_sinh) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="noi_sinh">Nơi sinh:</label>
                        <input type="text" class="form-control" id="noi_sinh" name="noi_sinh" value="{{ old('noi_sinh', $hocVien->noi_sinh) }}">
                    </div>
                    <div class="form-group">
                        <label for="dan_toc">Dân tộc:</label>
                        <input type="text" class="form-control" id="dan_toc" name="dan_toc" value="{{ old('dan_toc', $hocVien->dan_toc) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="so_dien_thoai">Số điện thoại:</label>
                        <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="{{ old('so_dien_thoai', $hocVien->so_dien_thoai) }}">
                    </div>
                    <div class="form-group">
                        <label for="ngay_dang_ky">Ngày đăng ký:</label>
                        <input type="date" class="form-control" id="ngay_dang_ky" name="ngay_dang_ky" value="{{ old('ngay_dang_ky', $hocVien->ngay_dang_ky) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_khoa_hoc">Khoá học:</label>
                    <select class="form-control" id="id_khoa_hoc" name="id_khoa_hoc">
                        <option value="">Chọn Khoá học</option>
                        @foreach($khoaHocs as $khoaHoc)
                        <option value="{{ $khoaHoc->id_khoa_hoc }}" {{ $khoaHoc->id_khoa_hoc == $hocVien->id_khoa_hoc ? 'selected' : '' }}>{{ $khoaHoc->ten_khoa_hoc }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" id="nganh_hoc_container">
                    <label for="id_nganh">Ngành học:</label>
                    <select class="form-control" id="id_nganh" name="id_nganh">
                        <option value="">Chọn Ngành học</option>
                        @foreach($nghanhs as $nganh)
                        <option value="{{ $nganh->id_nganh }}" {{ $nganh->id_nganh == $hocVien->id_nganh ? 'selected' : '' }}>{{ $nganh->ten_nganh }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="gioi_tinh">Giới tính:</label>
                    <select class="form-control" id="gioi_tinh" name="gioi_tinh">
                        <option value="">Chọn giới tính</option>
                        <option value="Nam" {{ $hocVien->gioi_tinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ $hocVien->gioi_tinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                        <option value="Khác" {{ $hocVien->gioi_tinh == 'Khác' ? 'selected' : '' }}>Khác</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ung_dung_cntt">Ứng dụng CNTT:</label>
                    <select class="form-control" id="ung_dung_cntt" name="ung_dung_cntt">
                        <option value="">Chọn ứng dụng CNTT</option>
                        <option value="Nâng cao" {{ $hocVien->ung_dung_cntt == 'Nâng cao' ? 'selected' : '' }}>Nâng cao</option>
                        <option value="Cơ bản" {{ $hocVien->ung_dung_cntt == 'Cơ bản' ? 'selected' : '' }}>Cơ bản</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ghi_chu">Ghi chú:</label>
                    <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3">{{ old('ghi_chu', $hocVien->ghi_chu) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
            </form>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
    $('#id_khoa_hoc').change(function(){
        var selectedText = $(this).find("option:selected").text().toLowerCase(); // Lấy text của option được chọn và chuyển thành chữ thường
        if(selectedText === "khác"){
            $('#nganh_hoc_container').hide(); // Ẩn dropdown của ngành học
        } else {
            $('#nganh_hoc_container').show(); // Hiển thị dropdown của ngành học
        }
    });
});
    </script>  
</body>
</html>

@endsection
