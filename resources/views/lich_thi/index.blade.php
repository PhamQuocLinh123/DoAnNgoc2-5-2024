<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Lịch Thi</title>
    <!-- Link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Link CSS DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
        <h1>Danh sách Lịch Thi</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('lich_thi.create') }}" class="btn btn-primary mb-3">Tạo mới</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Đợt thi</th>
                    <th>Giờ thi</th>
                    <th>Phòng thi</th>
                    <th>Số lượng</th>
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lichThiEntries as $lichThiEntry)
                    <tr>
                        <td>{{ $lichThiEntry->dotThi->ngay_thi }}</td>
                        <td>{{ $lichThiEntry->gioThi->gio_bat_dau }}</td>
                        <td>{{ $lichThiEntry->phongThi->ten_phong }}</td>
                        <td>{{ $lichThiEntry->so_luong }}</td>
                        <td><a href="{{ route('lich_thi.edit', $lichThiEntry->id_lich_thi) }}" class="btn btn-warning">Chỉnh sửa</a></td>
                        <td>
                            <form action="{{ route('lich_thi.destroy', $lichThiEntry->id_lich_thi) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Link JS jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Link JS DataTables -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "paging": true, // Cho phép phân trang
                "searching": true, // Cho phép tìm kiếm
                // Thêm các tùy chọn khác tại đây nếu cần
            });
        });
    </script>
</body>
</html>
