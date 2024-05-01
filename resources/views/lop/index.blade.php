<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp học</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <style>
        /* Thêm CSS tùy chỉnh tại đây */
    </style>
</head>
<body>

<div class="container">
    <h1 class="mt-5 mb-4">Danh sách các lớp học</h1>
    <a href="{{ route('lops.create') }}" class="btn btn-success mb-3">Thêm lớp mới</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên lớp</th>
                <th scope="col">Số tiết</th>
                <th scope="col">Học phí</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lops as $lop)
                <tr>
                    <th scope="row">{{ $lop->id_lop }}</th>
                    <td>{{ $lop->ten_lop }}</td>
                    <td>{{ $lop->so_tiet }}</td>
                    <td>{{ $lop->hoc_phi }}</td>
                    <td>
                        <a href="{{ route('lops.show', $lop->id_lop) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('lops.edit', $lop->id_lop) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>
                        <form action="{{ route('lops.destroy', $lop->id_lop) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
