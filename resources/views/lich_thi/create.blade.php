<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Lịch Thi</title>
    <!-- Link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Thêm CSS tùy chỉnh */
        body {
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
            border: 2px solid #34c1f0; /* Viền xám nhạt */
            border-radius: 5px;
            padding: 20px;
            background-color: #f8f9fa; /* Màu nền xám nhạt */
        }
        label {
            font-weight: bold;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ced4da; /* Viền xám nhạt */
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #1c08f4; /* Màu nền xanh */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3; /* Màu nền xanh nhạt */
        }
    </style>
</head>
<body>
    <h1 class="text-center mb-4">Tạo mới Lịch Thi</h1>

    <form action="{{ route('lich_thi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_dot_thi">Đợt Thi:</label>
            <select name="id_dot_thi" id="id_dot_thi" class="form-control">
                @foreach($dotThiList as $dotThi)
                    <option value="{{ $dotThi->id_dot_thi }}">{{ $dotThi->ngay_thi }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_gio_thi">Giờ Thi:</label>
            <select name="id_gio_thi" id="id_gio_thi" class="form-control">
                @foreach($gioThiList as $gioThi)
                    <option value="{{ $gioThi->id_gio_thi }}">{{ $gioThi->gio_bat_dau }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_phong_thi">Phòng Thi:</label>
            <select name="id_phong_thi" id="id_phong_thi" class="form-control">
                @foreach($phongThiList as $phongThi)
                    <option value="{{ $phongThi->id_phong_thi }}">{{ $phongThi->ten_phong }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="so_luong">Số Lượng:</label>
            <input type="number" name="so_luong" id="so_luong" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Tạo mới</button>
    </form>

    <!-- Link JS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
