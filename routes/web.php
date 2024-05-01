<?php
 
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NganhController;
use App\Http\Controllers\KhoaHocController;
use App\Http\Controllers\HocVienController;
use App\Http\Controllers\LopChungChiController;
use App\Http\Controllers\DangKyController;
use App\Http\Controllers\DotThiController;
use App\Http\Controllers\PhongThiController;
use App\Http\Controllers\GioThiController;
use App\Http\Controllers\LichThiController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\DuThiController;
use App\Http\Controllers\PasswordController;

// Route::get('/', function () {
//     return view('welcome');
// });
 
Auth::routes();
   
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
   
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
   
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    //Nghành 
Route::get('nganh', [NganhController::class, 'index'])->name('nganh.index');
Route::get('nganh/create', [NganhController::class, 'create'])->name('nganh.create');
Route::post('nganh', [NganhController::class, 'store'])->name('nganh.store');
Route::get('nganh/{nganh}', [NganhController::class, 'show'])->name('nganh.show');
Route::get('nganh/{nganh}/edit', [NganhController::class, 'edit'])->name('nganh.edit');
Route::put('nganh/{nganh}', [NganhController::class, 'update'])->name('nganh.update');
Route::delete('nganh/{nganh}', [NganhController::class, 'destroy'])->name('nganh.destroy');
//Khóa
Route::get('/khoa_hoc', [KhoaHocController::class, 'index'])->name('khoa_hoc.index');
Route::get('/khoa_hoc/create', [KhoaHocController::class, 'create'])->name('khoa_hoc.create');
Route::post('/khoa_hoc', [KhoaHocController::class, 'store'])->name('khoa_hoc.store');
Route::get('/khoa_hoc/{khoa_hoc}', [KhoaHocController::class, 'show'])->name('khoa_hoc.show');
Route::get('/khoa_hoc/{khoa_hoc}/edit', [KhoaHocController::class, 'edit'])->name('khoa_hoc.edit');
Route::put('/khoa_hoc/{khoa_hoc}', [KhoaHocController::class, 'update'])->name('khoa_hoc.update');
Route::delete('/khoa_hoc/{khoa_hoc}', [KhoaHocController::class, 'destroy'])->name('khoa_hoc.destroy');
//Học viên
Route::get('/hoc-vien', [HocVienController::class, 'index'])->name('hoc_vien.index');
Route::get('/hoc-vien/create', [HocVienController::class, 'create'])->name('hoc_vien.create');
Route::post('/hoc-vien', [HocVienController::class, 'store'])->name('hoc_vien.store');
Route::get('/hoc-vien/{hocVien}', [HocVienController::class, 'show'])->name('hoc_vien.show');
Route::get('/hoc-vien/{hocVien}/edit', [HocVienController::class, 'edit'])->name('hoc_vien.edit');
Route::put('/hoc-vien/{hocVien}', [HocVienController::class, 'update'])->name('hoc_vien.update');
Route::delete('/hoc-vien/{hocVien}', [HocVienController::class, 'destroy'])->name('hoc_vien.destroy');
Route::get('/hoc_vien/nang-cao', [HocVienController::class, 'indexNangCao'])->name('hoc_vien.index_nang_cao');
Route::get('/hoc_vien/co-ban', [HocVienController::class, 'indexCoBan'])->name('hoc_vien.index_co_ban');
Route::get('/hocvien/import', function () {
    return view('hoc_vien.import');
});

Route::post('/hocvien/import', [HocVienController::class, 'import'])->name('hoc_vien.import');

// Lớp
Route::get('/lops', [LopChungChiController::class, 'index'])->name('lops.index');
Route::get('/lops/create', [LopChungChiController::class, 'create'])->name('lops.create');
Route::post('/lops', [LopChungChiController::class, 'store'])->name('lops.store');
Route::get('/lops/{id}', [LopChungChiController::class, 'show'])->name('lops.show');
Route::get('/lops/{id}/edit', [LopChungChiController::class, 'edit'])->name('lops.edit');
Route::put('/lops/{id}', [LopChungChiController::class, 'update'])->name('lops.update');
Route::delete('/lops/{id}', [LopChungChiController::class, 'destroy'])->name('lops.destroy');

// Học viên đăng kí học 1 lớp chứng chỉ 
Route::get('/dang-ky-co-ban', [DangKyController::class, 'createCoBan'])->name('dang_ky.co_ban');
Route::post('/dang-ky-co-ban', [DangKyController::class, 'store'])->name('dang_ky.co_ban.submit');
Route::get('/dang-ky-nang-cao', [DangKyController::class, 'createNangCao'])->name('dang_ky.nang_cao');
Route::post('/dang-ky-nang-cao', [DangKyController::class, 'store'])->name('dang_ky.nang_cao.submit');
Route::get('dangky', [DangKyController::class, 'index'])->name('dangky.index');
Route::get('dangky/lop/{id_lop}', [DangKyController::class, 'showByLop'])->name('dangky.lop');

// Đợt thi
Route::get('/dot-thi', [DotThiController::class, 'index'])->name('dot_thi.index');
Route::get('/dot-thi/create', [DotThiController::class, 'create'])->name('dot_thi.create');
Route::post('/dot-thi', [DotThiController::class, 'store'])->name('dot_thi.store');
Route::get('/dot-thi/{id}/edit', [DotThiController::class, 'edit'])->name('dot_thi.edit');
Route::put('/dot-thi/{id}', [DotThiController::class, 'update'])->name('dot_thi.update');
Route::delete('/dot-thi/{id}', [DotThiController::class, 'destroy'])->name('dot_thi.destroy');

//Phòng thi
Route::get('/phong-thi', [PhongThiController::class, 'index'])->name('phong_thi.index');
Route::get('/phong-thi/create', [PhongThiController::class, 'create'])->name('phong_thi.create');
Route::post('/phong-thi', [PhongThiController::class, 'store'])->name('phong_thi.store');
Route::get('/phong-thi/{id}/edit', [PhongThiController::class, 'edit'])->name('phong_thi.edit');
Route::put('/phong-thi/{id}', [PhongThiController::class, 'update'])->name('phong_thi.update');
Route::delete('/phong-thi/{id}', [PhongThiController::class, 'destroy'])->name('phong_thi.destroy');

// Giờ thi 
Route::get('/gio-thi/create', [GioThiController::class, 'create'])->name('gio_thi.create');
Route::post('/gio-thi', [GioThiController::class, 'store'])->name('gio_thi.store');
Route::get('/gio-thi/{id}/edit', [GioThiController::class, 'edit'])->name('gio_thi.edit');
Route::put('/gio-thi/{id}', [GioThiController::class, 'update'])->name('gio_thi.update');
Route::delete('/gio-thi/{id}', [GioThiController::class, 'destroy'])->name('gio_thi.destroy');
Route::get('/gio-thi', [GioThiController::class, 'index'])->name('gio_thi.index');

//Lịch thi
Route::get('/lich-thi/create', [LichThiController::class, 'create'])->name('lich_thi.create');
Route::post('/lich-thi', [LichThiController::class, 'store'])->name('lich_thi.store');
Route::get('/lich-thi/{id}/edit', [LichThiController::class, 'edit'])->name('lich_thi.edit');
Route::put('/lich-thi/{id}', [LichThiController::class, 'update'])->name('lich_thi.update');
Route::delete('/lich-thi/{id}', [LichThiController::class, 'destroy'])->name('lich_thi.destroy');
Route::get('/lich-thi', [LichThiController::class, 'index'])->name('lich_thi.index');
   
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:usser'])->group(function () {
   
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

// Route::group(['middleware' => 'guest'], function () {
//     Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
//     Route::post('/register', [App\Http\Controllers\AuthController::class, 'registerPost'])->name('register');
//     Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
//     Route::post('/login', [App\Http\Controllers\AuthController::class, 'loginPost'])->name('login');
// });
 
// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//     Route::delete('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
// });

//Route của bảng học viên 
    // Thêm học viên
// Route::get('/them-hoc-vien', [App\Http\Controllers\HocVienController::class, 'createForm']);
// Route::post('/them-hoc-vien', [App\Http\Controllers\HocVienController::class, 'store']);
// hiển thị tất cả học viên
// Route::get('/hoc-vien', [HocVienController::class, 'show'])->name('hocvien.show');
// //Hiển thị chi tiết học viên 
// Route::get('/hoc-vien/{id}', [HocVienController::class, 'viewDetails'])->name('hocvien.details');
// // Xuất PDF thông tin chi tiết 
// Route::get('/hocvien/{id}/export-pdf', [HocVienController::class, 'exportPDF'])->name('hocvien.exportPDF');
// //Xuất excel 
// Route::get('/hocvien/export-excel', [HocVienController::class, 'exportExcel'])->name('hocvien.exportExcel');

// // Hiển thị học viên cơ bản 
// Route::get('/hoc-vien-co-ban', [HocVienController::class, 'index'])->name('hoc-vien-co-ban.index');
// // Lọc ra những học viên cơ bản thi 
// Route::post('/hoc-vien-thi-co-ban', [HocVienCoBanThiController::class, 'store'])->name('hoc-vien-thi-co-ban.store');

// //Nghành 
// Route::get('nganh', [NganhController::class, 'index'])->name('nganh.index');
// Route::get('nganh/create', [NganhController::class, 'create'])->name('nganh.create');
// Route::post('nganh', [NganhController::class, 'store'])->name('nganh.store');
// Route::get('nganh/{nganh}', [NganhController::class, 'show'])->name('nganh.show');
// Route::get('nganh/{nganh}/edit', [NganhController::class, 'edit'])->name('nganh.edit');
// Route::put('nganh/{nganh}', [NganhController::class, 'update'])->name('nganh.update');
// Route::delete('nganh/{nganh}', [NganhController::class, 'destroy'])->name('nganh.destroy');
// //Khóa
// Route::get('/khoa_hoc', [KhoaHocController::class, 'index'])->name('khoa_hoc.index');
// Route::get('/khoa_hoc/create', [KhoaHocController::class, 'create'])->name('khoa_hoc.create');
// Route::post('/khoa_hoc', [KhoaHocController::class, 'store'])->name('khoa_hoc.store');
// Route::get('/khoa_hoc/{khoa_hoc}', [KhoaHocController::class, 'show'])->name('khoa_hoc.show');
// Route::get('/khoa_hoc/{khoa_hoc}/edit', [KhoaHocController::class, 'edit'])->name('khoa_hoc.edit');
// Route::put('/khoa_hoc/{khoa_hoc}', [KhoaHocController::class, 'update'])->name('khoa_hoc.update');
// Route::delete('/khoa_hoc/{khoa_hoc}', [KhoaHocController::class, 'destroy'])->name('khoa_hoc.destroy');
// //Học viên
// Route::get('/hoc-vien', [HocVienController::class, 'index'])->name('hoc_vien.index');
// Route::get('/hoc-vien/create', [HocVienController::class, 'create'])->name('hoc_vien.create');
// Route::post('/hoc-vien', [HocVienController::class, 'store'])->name('hoc_vien.store');
// Route::get('/hoc-vien/{hocVien}', [HocVienController::class, 'show'])->name('hoc_vien.show');
// Route::get('/hoc-vien/{hocVien}/edit', [HocVienController::class, 'edit'])->name('hoc_vien.edit');
// Route::put('/hoc-vien/{hocVien}', [HocVienController::class, 'update'])->name('hoc_vien.update');
// Route::delete('/hoc-vien/{hocVien}', [HocVienController::class, 'destroy'])->name('hoc_vien.destroy');
// Route::get('/hoc_vien/nang-cao', [HocVienController::class, 'indexNangCao'])->name('hoc_vien.index_nang_cao');
// Route::get('/hoc_vien/co-ban', [HocVienController::class, 'indexCoBan'])->name('hoc_vien.index_co_ban');
// Route::get('/hoc_vien/import', [HocVienController::class, 'showImportForm'])->name('hoc_vien.show_import_form');
// Route::post('/hoc_vien/import', [HocVienController::class, 'import'])->name('hoc_vien.import');

// // Lớp
// Route::get('/lops', [LopChungChiController::class, 'index'])->name('lops.index');
// Route::get('/lops/create', [LopChungChiController::class, 'create'])->name('lops.create');
// Route::post('/lops', [LopChungChiController::class, 'store'])->name('lops.store');
// Route::get('/lops/{id}', [LopChungChiController::class, 'show'])->name('lops.show');
// Route::get('/lops/{id}/edit', [LopChungChiController::class, 'edit'])->name('lops.edit');
// Route::put('/lops/{id}', [LopChungChiController::class, 'update'])->name('lops.update');
// Route::delete('/lops/{id}', [LopChungChiController::class, 'destroy'])->name('lops.destroy');

// // Học viên đăng kí học 1 lớp chứng chỉ 
// Route::get('/dang-ky-co-ban', [DangKyController::class, 'createCoBan'])->name('dang_ky.co_ban');
// Route::post('/dang-ky-co-ban', [DangKyController::class, 'store'])->name('dang_ky.co_ban.submit');
// Route::get('/dang-ky-nang-cao', [DangKyController::class, 'createNangCao'])->name('dang_ky.nang_cao');
// Route::post('/dang-ky-nang-cao', [DangKyController::class, 'store'])->name('dang_ky.nang_cao.submit');
// Route::get('dangky', [DangKyController::class, 'index'])->name('dangky.index');
// Route::get('dangky/lop/{id_lop}', [DangKyController::class, 'showByLop'])->name('dangky.lop');

// // Đợt thi
// Route::get('/dot-thi', [DotThiController::class, 'index'])->name('dot_thi.index');
// Route::get('/dot-thi/create', [DotThiController::class, 'create'])->name('dot_thi.create');
// Route::post('/dot-thi', [DotThiController::class, 'store'])->name('dot_thi.store');
// Route::get('/dot-thi/{id}/edit', [DotThiController::class, 'edit'])->name('dot_thi.edit');
// Route::put('/dot-thi/{id}', [DotThiController::class, 'update'])->name('dot_thi.update');
// Route::delete('/dot-thi/{id}', [DotThiController::class, 'destroy'])->name('dot_thi.destroy');

// //Phòng thi
// Route::get('/phong-thi', [PhongThiController::class, 'index'])->name('phong_thi.index');
// Route::get('/phong-thi/create', [PhongThiController::class, 'create'])->name('phong_thi.create');
// Route::post('/phong-thi', [PhongThiController::class, 'store'])->name('phong_thi.store');
// Route::get('/phong-thi/{id}/edit', [PhongThiController::class, 'edit'])->name('phong_thi.edit');
// Route::put('/phong-thi/{id}', [PhongThiController::class, 'update'])->name('phong_thi.update');
// Route::delete('/phong-thi/{id}', [PhongThiController::class, 'destroy'])->name('phong_thi.destroy');

// // Giờ thi 
// Route::get('/gio-thi/create', [GioThiController::class, 'create'])->name('gio_thi.create');
// Route::post('/gio-thi', [GioThiController::class, 'store'])->name('gio_thi.store');
// Route::get('/gio-thi/{id}/edit', [GioThiController::class, 'edit'])->name('gio_thi.edit');
// Route::put('/gio-thi/{id}', [GioThiController::class, 'update'])->name('gio_thi.update');
// Route::delete('/gio-thi/{id}', [GioThiController::class, 'destroy'])->name('gio_thi.destroy');
// Route::get('/gio-thi', [GioThiController::class, 'index'])->name('gio_thi.index');

// //Lịch thi
// Route::get('/lich-thi/create', [LichThiController::class, 'create'])->name('lich_thi.create');
// Route::post('/lich-thi', [LichThiController::class, 'store'])->name('lich_thi.store');
// Route::get('/lich-thi/{id}/edit', [LichThiController::class, 'edit'])->name('lich_thi.edit');
// Route::put('/lich-thi/{id}', [LichThiController::class, 'update'])->name('lich_thi.update');
// Route::delete('/lich-thi/{id}', [LichThiController::class, 'destroy'])->name('lich_thi.destroy');
// Route::get('/lich-thi', [LichThiController::class, 'index'])->name('lich_thi.index');


Route::get('/export', function () {
    return view('export');
});

Route::get('/export/hocvien', [ExcelController::class, 'exportHocVien'])->name('export.hocvien');
// Dự thi
Route::get('/du_thi', [DuThiController::class, 'index'])->name('du_thi.index');
Route::get('/du_thi/create_co_ban', [DuThiController::class, 'create'])->name('du_thi.create');
Route::post('/du_thi', [DuThiController::class, 'store'])->name('du_thi.store');
Route::get('/du_thi/{id_hoc_vien}/{id_lich_thi}', [DuThiController::class, 'show'])->name('du_thi.show');
Route::get('/du_thi/{id_hoc_vien}/{id_lich_thi}/chamdiem', [DuThiController::class, 'capnhatdiem'])->name('du_thi.capnhatdiem');
Route::put('/du_thi/{id_hoc_vien}/{id_lich_thi}', [DuThiController::class, 'chamdiem'])->name('du_thi.chamdiem');
Route::delete('/du_thi/{id_hoc_vien}/{id_lich_thi}', [DuThiController::class, 'destroy'])->name('du_thi.destroy');
Route::get('/du_thi/create_nang_cao', [DuThiController::class, 'createNangCao'])->name('du_thi.create_nang_cao');
Route::post('/du_thi/store_nang_cao', [DuThiController::class, 'storeNangCao'])->name('du_thi.store_nang_cao');

Route::get('/du_thi/cham_diem', [DuThiController::class, 'showChamDiemForm'])->name('du_thi.show_cham_diem_form');
Route::post('/du_thi/cham_diem', [DuThiController::class, 'chamDiem'])->name('du_thi.cham_diem');


Route::get('/export-pdf', [HocVienController::class, 'exportPDF'])->name('export.pdf');
//Mật khẩu thí sinh
Route::get('/mat_khau', [PasswordController::class, 'index'])->name('mat_khau.index');
// Route để hiển thị view cho việc tạo mật khẩu cho tất cả học viên
Route::get('/generate-password', function () {
return view('mat_khau.generate_password');
})->name('generate-password');
// Route để xử lý việc tạo mật khẩu cho tất cả học viên
Route::post('/generate-password-for-all', [PasswordController::class, 'createPasswordForAllStudents'])
    ->name('generate-password-for-all');
Route::get('/export-excel', [PasswordController::class, 'exportExcel'])->name('export.excel');