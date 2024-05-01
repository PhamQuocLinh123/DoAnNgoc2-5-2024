<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách lớp học</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        /* Thêm CSS tùy chỉnh tại đây */
    </style>
</head>
<body>

<div class="container">
    <h1 class="mt-5 mb-4">Danh sách các lớp học</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên lớp</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lops as $index => $lop)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $lop->ten_lop }}</td>
                    <td>{{ $lop->mo_ta }}</td>
                    <td>
                        <a href="{{ route('dangky.lop', ['id_lop' => $lop->id_lop]) }}" class="btn btn-primary">Xem đăng ký</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "paging": true, // Cho phép phân trang
            "searching": true // Cho phép tìm kiếm
            // Thêm các tùy chọn khác tại đây nếu cần
        });
    });
</script>

</body>
</html>
