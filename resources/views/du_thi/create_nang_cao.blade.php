<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Dự Thi (Nâng Cao)</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            border-radius: 15px 15px 0 0;
        }

        .card-body {
            background-color: #fff;
            border-radius: 0 0 15px 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Thêm Dự Thi (Nâng Cao)</div>

                    <div class="card-body">
                        <!-- Hiển thị thông báo thành công -->
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <!-- Hiển thị thông báo lỗi -->
                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        <!-- Hiển thị các lỗi validation -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('du_thi.store_nang_cao') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="id_hoc_vien_dau">Học Viên Đầu (Nâng Cao):</label>
                                <select class="form-control" id="id_hoc_vien_dau" name="id_hoc_vien_dau">
                                    @foreach ($hocVienList as $hocVien)
                                        @if ($hocVien->ung_dung_cntt == 'Nâng cao')
                                            <option value="{{ $hocVien->id_hoc_vien }}">{{ $hocVien->ho_ten }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_hoc_vien_cuoi">Học Viên Cuối (Nâng Cao):</label>
                                <select class="form-control" id="id_hoc_vien_cuoi" name="id_hoc_vien_cuoi">
                                    @foreach ($hocVienList as $hocVien)
                                        @if ($hocVien->ung_dung_cntt == 'Nâng cao')
                                            <option value="{{ $hocVien->id_hoc_vien }}">{{ $hocVien->ho_ten }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_lich_thi">Lịch Thi (Ngày Thi - Giờ Bắt Đầu - Tên Phòng):</label>
                                <select class="form-control" id="id_lich_thi" name="id_lich_thi">
                                    @foreach($lichThiList as $lichThi)
                                    <option value="{{ $lichThi->id_lich_thi }}">
                                        {{ $lichThi->dotThi->ngay_thi }} - {{ $lichThi->gioThi->gio_bat_dau }} -
                                        {{ $lichThi->phongThi->ten_phong }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="so_giua">Khóa (2 chữ số):</label>
                                <input type="text" class="form-control" id="so_giua" name="so_giua">
                            </div>

                            <!-- Hidden input field để lưu số báo danh được tạo -->
                            <input type="hidden" id="So_bao_danh" name="So_bao_danh">

                            <!-- Nút Submit -->
                            <button type="submit" class="btn btn-primary btn-block">Thêm Dự Thi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script để tính toán và cập nhật số báo danh -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lắng nghe sự kiện thay đổi của trường "Khóa"
            document.getElementById('so_giua').addEventListener('input', updateSoBaoDanh);

            // Hàm cập nhật số báo danh khi trường "Khóa" thay đổi
            function updateSoBaoDanh() {
                var khoa = document.getElementById('so_giua').value;
                var soBaoDanh = document.getElementById('So_bao_danh').value;
                var soBaoDanhPrefix = soBaoDanh.substring(0, 2); // Lấy tiền tố của số báo danh
                var soBaoDanhNumber = soBaoDanh.substring(2); // Lấy phần số của số báo danh (3 số cuối)

                // Kiểm tra nếu tiền tố của số báo danh khác với khóa mới
                if (soBaoDanhPrefix !== khoa) {
                    // Cập nhật tiền tố của số báo danh thành khóa mới
                    soBaoDanhPrefix = khoa;
                    // Reset số của số báo danh về 001
                    soBaoDanhNumber = "001";
                }

                // Cập nhật giá trị mới của số báo danh
                var newSoBaoDanh = soBaoDanhPrefix + soBaoDanhNumber;
                document.getElementById('So_bao_danh').value = newSoBaoDanh;
            }
        });
    </script>

</body>

</html>
