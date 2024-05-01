<!DOCTYPE html>
<html>
<head>
    <title>Thêm Giờ Thi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles */
        .container {
            max-width: 500px;
        }
        /* Căn giữa nút button */
        .btn-container {
            text-align: center;
        }
        /* Tạo viền xanh cho form */
        form {
            border: 2px solid #34c1f0;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Thêm Giờ Thi</h2>
        <form action="{{ route('gio_thi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="gio_bat_dau">Thời Gian Bắt Đầu :</label>
                <input type="time" class="form-control" id="gio_bat_dau" name="gio_bat_dau" onchange="calculateEndTime()">
            </div>
            <div class="form-group">
                <label for="gio_ket_thuc">Thời Gian Kết Thúc :</label>
                <input type="time" class="form-control" id="gio_ket_thuc" name="gio_ket_thuc" readonly>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
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
