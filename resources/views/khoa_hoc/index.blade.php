<!-- resources/views/khoa_hoc/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Danh sách khóa học</h1>
    <a href="{{ route('khoa_hoc.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên khóa học</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($khoaHocs as $khoaHoc)
            <tr id="khoa_hoc_{{ $khoaHoc->id_khoa_hoc }}">
                <td>{{ $khoaHoc->id_khoa_hoc }}</td>
                <td>{{ $khoaHoc->ten_khoa_hoc }}</td>
                <td>
                    <a href="{{ route('khoa_hoc.show', $khoaHoc->id_khoa_hoc) }}" class="btn btn-sm btn-info">Xem</a>
                    <a href="{{ route('khoa_hoc.edit', $khoaHoc->id_khoa_hoc) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $khoaHoc->id_khoa_hoc }}">Xóa</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Script to show confirmation dialog for delete -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var khoaHocId = button.getAttribute('data-id');
                var confirmDelete = confirm('Bạn có chắc muốn xóa khóa học này?');

                if (confirmDelete) {
                    // Gửi yêu cầu DELETE bằng AJAX
                    fetch(`/khoa_hoc/${khoaHocId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(function (response) {
                        if (response.ok) {
                            // Xóa hàng chỉ mục tương ứng từ DOM
                            var khoaHocRow = document.getElementById('khoa_hoc_' + khoaHocId);
                            khoaHocRow.parentNode.removeChild(khoaHocRow);
                        } 
                    })
                    .catch(function (error) {
                        alert(error.message);
                    });
                }
            });
        });
    });
</script>
@endsection
