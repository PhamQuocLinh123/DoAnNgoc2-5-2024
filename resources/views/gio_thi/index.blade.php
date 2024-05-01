<!-- resources/views/gio_thi/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Giờ Thi</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
        <h1>Danh sách Giờ Thi</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('gio_thi.create') }}" class="btn btn-primary mb-3">Tạo mới</a>

        <table id="phongThiTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Giờ bắt đầu</th>
                    <th>Giờ kết thúc</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gioThiEntries as $gioThiEntry)
                    <tr>
                        <td>{{ $gioThiEntry->gio_bat_dau }}</td>
                        <td>{{ $gioThiEntry->gio_ket_thuc }}</td>
                        <td>
                            <a href="{{ route('gio_thi.edit', $gioThiEntry->id_gio_thi) }}" class="btn btn-info">Chỉnh sửa</a>
                            <form action="{{ route('gio_thi.destroy', $gioThiEntry->id_gio_thi) }}" method="POST" style="display: inline-block;">
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

    <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#phongThiTable').DataTable({
                "paging": true,
                "searching": true
            });
        });
    </script>
</body>
</html>
