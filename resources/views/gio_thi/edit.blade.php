<!-- resources/views/gio_thi/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Giờ Thi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Định dạng cho form */
        .form-container {
            margin: auto; /* Căn giữa form */
            max-width: 400px; /* Chiều rộng tối đa của form */
            padding: 20px;
            border: 2px solid #34c1f0; /* Viền xám cho form */
            border-radius: 5px; /* Bo tròn góc của form */
        }

        /* Định dạng cho nút Lưu */
        .btn-save {
            width: 100%; /* Chiều rộng của nút */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Chỉnh sửa Giờ Thi</h1>

        <div class="form-container"> <!-- Thêm class form-container -->
            <form action="{{ route('gio_thi.update', $gioThiEntry->id_gio_thi) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="gio_bat_dau">Giờ bắt đầu:</label>
                    <input type="time" class="form-control" id="gio_bat_dau" name="gio_bat_dau" value="{{ $gioThiEntry->gio_bat_dau }}" onchange="calculateEndTime()">
                </div>
                <div class="form-group">
                    <label for="gio_ket_thuc">Giờ kết thúc:</label>
                    <input type="time" class="form-control" id="gio_ket_thuc" name="gio_ket_thuc" value="{{ $gioThiEntry->gio_ket_thuc }}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-save">Lưu</button> <!-- Thêm class btn-save -->
                </div>
            </form>
        </div>
    </div>

    <script>
        function calculateEndTime() {
            var gioBatDau = document.getElementById('gio_bat_dau').value;
            var gioBatDauObj = new Date('2000-01-01T' + gioBatDau + ':00');
            gioBatDauObj.setMinutes(gioBatDauObj.getMinutes() + 145);
            var gioKetThuc = gioBatDauObj.toTimeString().substring(0, 5);
            document.getElementById('gio_ket_thuc').value = gioKetThuc;
        }
    </script>
</body>
</html>
