{{-- <form action="{{ route('dang_ky.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="hoc_vien_co_ban">Học viên cơ bản:</label>
        <select class="form-control" name="id_hoc_vien[]" id="hoc_vien_co_ban" multiple required>
            @foreach($hocViensCoBan as $hocVien)
                <option value="{{ $hocVien->id_hoc_vien }}">{{ $hocVien->ho_ten }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="hoc_vien_nang_cao">Học viên nâng cao:</label>
        <select class="form-control" name="id_hoc_vien[]" id="hoc_vien_nang_cao" multiple required>
            @foreach($hocViensNangCao as $hocVien)
                <option value="{{ $hocVien->id_hoc_vien }}">{{ $hocVien->ho_ten }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="id_lop">Lớp chứng chỉ:</label>
        <select class="form-control" name="id_lop" id="id_lop" required>
            @foreach($lopChungChis as $lopChungChi)
                <option value="{{ $lopChungChi->id_lop }}">{{ $lopChungChi->ten_lop }} ({{ $lopChungChi->tieu_chi }})</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Trạng thái phí:</label><br>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="da_dong" name="trang_thai_phi" value="Đã đóng">
            <label class="form-check-label" for="da_dong">Đã đóng</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="chua_dong" name="trang_thai_phi" value="Chưa đóng">
            <label class="form-check-label" for="chua_dong">Chưa đóng</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Đăng ký</button>
</form> --}}
