@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">Danh sách Dự Thi</div>
                    <div class="card-body">
                        <select id="filterSoBaoDanh">
                            <option value="all">Tất cả</option>
                            <option value="CB">Cơ bản</option>
                            <option value="NC">Nâng cao</option>
                        </select>
                        <div class="table-responsive">
                            <table id="duThiTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Học viên</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Số báo danh</th>
                                        <th scope="col">Điểm lý thuyết</th>
                                        <th scope="col">Điểm thực hành</th>
                                        <th scope="col">Ngày thi</th>
                                        <th scope="col">Phòng thi</th>
                                        <th scope="col">Bắt đầu</th>
                                        <th scope="col">Kết thúc</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($duThiList as $duThi)
                                        <tr>
                                            <td>{{ $duThi->hocVien->ho_ten }}</td>
                                            <td>{{ $duThi->trang_thai }}</td>
                                            <td>{{ $duThi->So_bao_danh }}</td>
                                            <td>{{ $duThi->diem_ly_thuyet }}</td>
                                            <td>{{ $duThi->diem_thuc_hanh }}</td>
                                            <td>{{ $duThi->lichThi->dotThi->ngay_thi }}</td>
                                            <td>{{ $duThi->lichThi->phongThi->ten_phong }}</td>
                                            <td>{{ $duThi->lichThi->gioThi->gio_bat_dau }}</td>
                                            <td>{{ $duThi->lichThi->gioThi->gio_ket_thuc }}</td>
                                            <td>
                                                <div class="btn-group1">
                                                    <a href="{{ route('du_thi.show', [$duThi->id_hoc_vien, $duThi->id_lich_thi]) }}" class="btn btn-info">Xem</a>
                                                    <a href="{{ route('du_thi.capnhatdiem', [$duThi->id_hoc_vien, $duThi->id_lich_thi]) }}" class="btn btn-warning">Chấm Điểm</a>
                                                    <form action="{{ route('du_thi.destroy', [$duThi->id_hoc_vien, $duThi->id_lich_thi]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#duThiTable').DataTable();
            
            $('#filterSoBaoDanh').change(function() {
                var filterType = $(this).val();
                if (filterType === 'all') {
                    $('#duThiTable tbody tr').show();
                } else {
                    $('#duThiTable tbody tr').hide();
                    $('#duThiTable tbody tr').each(function() {
                        var soBaoDanh = $(this).find('td:eq(2)').text();
                        if (soBaoDanh.includes(filterType)) {
                            $(this).show();
                        }
                    });
                }
            });
        });
    </script>
    <style>
        /* Định dạng ô tìm kiếm */
        div.dataTables_wrapper input,
        div.dataTables_wrapper select {
            border: 2px solid #0f1010 !important;
            border-radius: 5px !important;
            padding: 5px 10px !important;
        }
        /* Định dạng các nút trong btn-group */
        .btn-group1 .btn {
            margin-top: 5px; /* Khoảng cách giữa các nút */
            padding: 5px 10px; /* Độ dày của nút */
        }

        /* Định dạng nút Xóa để căn lề */
        .btn-group1 .btn-danger {
            margin-right: 0; /* Loại bỏ margin-right */
            border-radius: 5px;
        }
    </style>
@endsection
