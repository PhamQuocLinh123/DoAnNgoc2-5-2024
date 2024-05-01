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
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Đăng kí</h1>
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

                <form action="{{ route('hoc_vien.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="ho_ten">Họ và tên:</label>
                        <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="{{ old('ho_ten') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="anh_3_4">Ảnh 3x4:</label>
                        <input type="file" class="form-control-file" id="anh_3_4" name="anh_3_4">
                    </div>

                    <div class="form-group">
                        <label for="so_can_cuoc">Số căn cước công dân:</label>
                        <input type="text" class="form-control" id="so_can_cuoc" name="so_can_cuoc" value="{{ old('so_can_cuoc') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="ngay_cap_can_cuoc">Ngày cấp căn cước công dân:</label>
                        <input type="date" class="form-control" id="ngay_cap_can_cuoc" name="ngay_cap_can_cuoc" value="{{ old('ngay_cap_can_cuoc') }}">
                    </div>

                    <div class="form-group">
                        <label for="noi_cap_can_cuoc">Nơi cấp căn cước công dân:</label>
                        <input type="text" class="form-control" id="noi_cap_can_cuoc" name="noi_cap_can_cuoc" value="{{ old('noi_cap_can_cuoc') }}">
                    </div>

                    <div class="form-group">
                        <label for="ngay_sinh">Ngày sinh:</label>
                        <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="{{ old('ngay_sinh') }}">
                    </div>

                    <div class="form-group">
                        <label for="noi_sinh">Nơi sinh:</label>
                        <input type="text" class="form-control" id="noi_sinh" name="noi_sinh" value="{{ old('noi_sinh') }}">
                    </div>

                    <div class="form-group">
                        <label for="dan_toc">Dân tộc:</label>
                        <input type="text" class="form-control" id="dan_toc" name="dan_toc" value="{{ old('dan_toc') }}">
                    </div>

                    <div class="form-group">
                        <label for="so_dien_thoai">Số điện thoại:</label>
                        <input type="number" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="{{ old('so_dien_thoai') }}">
                    </div>

                    <div id="khoa_hoc_container">
                        <div class="form-group">
                            <label for="id_khoa_hoc">Chọn Khoá học:</label>
                            <select class="form-control" id="id_khoa_hoc" name="id_khoa_hoc">
                                <option value="">Chọn Khoá học</option>
                                @foreach($khoaHocs as $khoaHoc)
                                    <option value="{{ $khoaHoc->id_khoa_hoc }}">{{ $khoaHoc->ten_khoa_hoc }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    
                    <div id="nganh_hoc_container">
                        <div class="form-group">
                            <label for="id_nganh">Chọn Ngành học:</label>
                            <select class="form-control" id="id_nganh" name="id_nganh">
                                <option value="">Chọn Ngành học</option>
                                @foreach($nghanhs as $nganh)
                                    <option value="{{ $nganh->id_nganh }}">{{ $nganh->ten_nganh }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label for="ngay_dang_ky">Đăng kí ngày học:</label>
                        <select class="form-control" id="ngay_dang_ky" name="ngay_dang_ky">
                            <option value="Tối 2-4-6 (17:45 - 20:45)">Tối 2-4-6 (17:45 - 20:45)</option>
                            <option value="Tối 3-5 (17:45 - 20:45)">Tối 3-5 (17:45 - 20:45)</option>
                            <option value="Tối 5-7 (17:45 - 20:45)">Tối 5-7 (17:45 - 20:45)</option>
                            <option value="Ngày thứ 7 - Chủ nhật">Ngày thứ 7 - Chủ nhật</option>
                        </select>
                    </div>
                    

                    <div class="form-group">
                        <label for="gioi_tinh">Giới tính:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gioi_tinh" id="gioi_tinh_nam" value="Nam"@checked(true)>
                            <label class="form-check-label" for="gioi_tinh_nam">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gioi_tinh" id="gioi_tinh_nu" value="Nữ">
                            <label class="form-check-label" for="gioi_tinh_nu">Nữ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gioi_tinh" id="gioi_tinh_khac" value="Khác">
                            <label class="form-check-label" for="gioi_tinh_khac">Khác</label>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label for="ung_dung_cntt">Ứng dụng CNTT:</label>
                        <select class="form-control" id="ung_dung_cntt" name="ung_dung_cntt">
                            <option value="">Chọn ứng dụng CNTT</option>
                            <option value="Nâng cao">Nâng cao</option>
                            <option value="Cơ bản">Cơ bản</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ghi_chu">Ghi chú:</label>
                        <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3">{{ old('ghi_chu') }}</textarea>
                    </div>
<br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Thêm Học Viên</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    {{-- XỬ LÝ KHI KHÓA LÀ :Khác thì ẩn ngành" --}}
    <script>
        $(document).ready(function(){
            $('#id_khoa_hoc').change(function(){
                var selectedText = $(this).find("option:selected").text().toLowerCase();
                if(selectedText === "khác"){
                    $('#nganh_hoc_container').hide();
                    $('#id_nganh').val(""); // Thiết lập giá trị trường id_nganh về null hoặc giá trị mặc định khác
                } else {
                    $('#nganh_hoc_container').show();
                }
            });
    
            // Cập nhật giá trị của trường id_nganh khi form được gửi đi để tránh lỗi validate
            $('form').submit(function() {
                if (!$('#nganh_hoc_container').is(':visible')) {
                    $('#id_nganh').val(""); // Thiết lập giá trị trường id_nganh về null hoặc giá trị mặc định khác nếu container bị ẩn
                }
            });
        });
    </script>
    
    
</body>
</html>

@endsection
