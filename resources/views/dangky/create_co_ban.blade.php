<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký học viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Thêm CSS tại đây để tùy chỉnh giao diện của form */
        .form-group {
            margin-bottom: 20px;
        }
        #studentTable th,
        #studentTable td {
            vertical-align: middle;
        }
    </style>
</head>
<body>

<div class="container">
    <form action="{{ route('dang_ky.co_ban.submit') }}" method="POST" id="registrationForm">
        @csrf

        <div class="form-group">
            <label for="id_lop">Lớp chứng chỉ:</label>
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
            <label for="hoc_vien_co_ban">Chọn học viên cơ bản:</label>
            <table class="table" id="studentTable">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên học viên</th>
                        <th scope="col">Chọn</th>
                        <th scope="col">Trạng thái học phí</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hocViensCoBan as $hocVien)
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
        const form = document.getElementById('registrationForm');

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

        // Kiểm tra khi form được submit
        form.addEventListener('submit', function(event) {
            studentCheckboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    // Lấy id của học viên
                    const studentId = checkbox.value;
                    // Kiểm tra học viên đã có lớp hay chưa
                    if (studentHasClass(studentId)) {
                        // Ngăn form submit
                        event.preventDefault();
                        // Hiển thị thông báo
                        alert('Học viên đã có lớp, không thể thêm vào lớp mới.');
                    }
                }
            });
        });

        // Hàm kiểm tra học viên đã có lớp hay chưa (đây là hàm mẫu, bạn cần thay thế bằng hàm kiểm tra thực tế)
        function studentHasClass(studentId) {
            // Thực hiện kiểm tra dựa trên ID của học viên
            // Trả về true nếu học viên đã có lớp, ngược lại trả về false
            // Ví dụ:
            // if (student đã có lớp) {
            //     return true;
            // } else {
            //     return false;
            // }
            // Hoặc bạn có thể thực hiện kiểm tra bằng AJAX request đến server để kiểm tra thông tin của học viên
        }
    });
</script>

</body>
</html>
