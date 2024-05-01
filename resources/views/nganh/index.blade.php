@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-5 mb-4">Danh sách các ngành</h1>
    <a href="{{ route('nganh.create') }}" class="btn btn-success mb-3">Thêm ngành mới</a>
    <table id="nganhTable" class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên ngành</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nganhs as $nganh)
                <tr>
                    <th scope="row">{{ $nganh->id_nganh }}</th>
                    <td>{{ $nganh->ten_nganh }}</td>
                    <td>
                        <a href="{{ route('nganh.show', $nganh->id_nganh) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('nganh.edit', $nganh->id_nganh) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>
                        <form action="{{ route('nganh.destroy', $nganh->id_nganh) }}" method="POST" style="display: inline;">
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
        $('#nganhTable').DataTable({
            "paging": true, // Cho phép phân trang
            "searching": true, // Cho phép tìm kiếm
            // Thêm các tùy chọn khác tại đây nếu cần
        });
    });
</script>
@endsection
