<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký học viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Thêm CSS tùy chỉnh tại đây nếu cần */
    </style>
</head>
<body>

<div class="container">
    <form action="{{ route('dang_ky.nang_cao.submit') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="id_lop">Chọn lớp chứng chỉ:</label>
            <select class="form-control" name="id_lop" id="id_lop" required>
                @foreach($lopChungChis as $lopChungChi)
                    <option value="{{ $lopChungChi->id_lop }}">{{ $lopChungChi->ten_lop }} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="selectAll">Chọn tất cả:</label>
            <input type="checkbox" id="selectAll">
        </div>

        <div class="form-group">
            <label for="hoc_vien_nang_cao">Chọn học viên nâng cao:</label>
            <table class="table" id="studentTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên học viên</th>
                        <th scope="col">Chọn</th>
                        <th scope="col">Trạng thái phí</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hocViensNangCao as $hocVien)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $hocVien->ho_ten }}</td>
                        <td>
                            <input type="checkbox" name="id_hoc_vien[]" class="studentCheckbox" value="{{ $hocVien->id_hoc_vien }}">
                        </td>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trang_thai_phi[{{ $hocVien->id_hoc_vien }}]" id="phi_da_thanh_toan_{{ $loop->iteration }}" value="Đã thanh toán">
                                <label class="form-check-label" for="phi_da_thanh_toan_{{ $loop->iteration }}">Đã thanh toán</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trang_thai_phi[{{ $hocVien->id_hoc_vien }}]" id="phi_chua_thanh_toan_{{ $loop->iteration }}" value="Chưa thanh toán">
                                <label class="form-check-label" for="phi_chua_thanh_toan_{{ $loop->iteration }}">Chưa thanh toán</label>
                            </div>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>

        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectAllCheckbox = document.getElementById('selectAll');
        const studentCheckboxes = document.querySelectorAll('.studentCheckbox');

        selectAllCheckbox.addEventListener('change', function () {
            const isChecked = this.checked;
            studentCheckboxes.forEach(function (checkbox) {
                checkbox.checked = isChecked;
            });
        });

        let lastCheckedIndex = null;
        studentCheckboxes.forEach(function (checkbox, index) {
            checkbox.addEventListener('click', function (event) {
                if (event.shiftKey && lastCheckedIndex !== null) {
                    const startIndex = Math.min(index, lastCheckedIndex);
                    const endIndex = Math.max(index, lastCheckedIndex);
                    for (let i = startIndex; i <= endIndex; i++) {
                        studentCheckboxes[i].checked = this.checked;
                    }
                }
                lastCheckedIndex = index;
            });
        });
    });
</script>

</body>
</html>
