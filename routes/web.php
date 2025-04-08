<?php

use App\Http\Controllers\LogSignController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhachHang\ProfileController;
use App\Http\Controllers\KhachHang\DonHangController;
use App\Http\Controllers\KhachHang\HoTroController;
use App\Http\Controllers\KhachHang\DanhGiaController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\KhuyenMaiController;
use App\Http\Controllers\XemDanhGiaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// đăng nhập đăng ký cho khách hàng
Route::get('customer-login', [LogSignController::class, 'viewloginCus'])->name('customer.login');
Route::post('customer/loginpost', [LogSignController::class, 'loginCus'])->name('customer.loginpost');
Route::get('customer-logout', [LogSignController::class, 'logoutCus'])->name('customer.logout');
Route::post('customer-logout', [LogSignController::class, 'logoutCus'])->name('customer.logout');

Route::get('customer-signup', [LogSignController::class, 'viewsignupCus'])->name('customer.signup');
Route::post('customer/signuppost', [LogSignController::class, 'signupCus'])->name('customer.signuppost');

Route::get('staff-login', [LogSignController::class, 'viewloginStaff'])->name('staff.login');
Route::post('staff/loginpost', [LogSignController::class, 'loginStaff'])->name('staff.loginpost');
Route::get('staff-logout', [LogSignController::class, 'logoutStaff'])->name('staff.logout');

// KHÁCH HÀNG
Route::get('khachhang/index', [KhachHangController::class, 'indexKhachHang'])->name('khachhang.index');
Route::get('khachhang/create', [KhachHangController::class, 'createKhachHang'])->name('khachhang.create');
Route::get('khachhang/{id}/edit', [KhachHangController::class, 'editKhachHang'])->where(['id' => '[0-9]+'])->name('khachhang.edit');
Route::post('khachhang/storeKhachHang', [KhachHangController::class, 'storeKhachHang'])->name('khachhang.storeKhachHang');
Route::post('khachhang/{id}/updateKhachHang', [KhachHangController::class, 'updateKhachHang'])->where(['id' => '[0-9]+'])->name('khachhang.update');
Route::delete('khachhang/{id}/delete', [KhachHangController::class, 'deleteKhachHang'])->name('khachhang.delete');

// KHUYẾN MÃI
Route::get('khuyenmai/index', [KhuyenMaiController::class, 'indexKhuyenMai'])->name('khuyenmai.index');
Route::get('khuyenmai/create', [KhuyenMaiController::class, 'createKhuyenMai'])->name('khuyenmai.create');
Route::get('khuyenmai/{id}/edit', [KhuyenMaiController::class, 'editKhuyenMai'])->where(['id' => '[0-9]+'])->name('khuyenmai.edit');
Route::post('khuyenmai/storeKhuyenMai', [KhuyenMaiController::class, 'storeKhuyenMai'])->name('khuyenmai.storeKhuyenMai');
Route::post('khuyenmai/{id}/updateKhuyenMai', [KhuyenMaiController::class, 'updateKhuyenMai'])->where(['id' => '[0-9]+'])->name('khuyenmai.update');
Route::delete('khuyenmai/{id}/delete', [KhuyenMaiController::class, 'deleteKhuyenMai'])->name('khuyenmai.delete');
//XEM ĐÁNH GIÁ
// Route::get('danhgia/index', [DanhGiaController::class, 'indexDanhGia'])->name('danhgia.index');
// Route::get('danhgia/index', [XemDanhGiaController::class, 'indexDanhGia'])->name('danhgiaindex.index');
Route::get('danhgia/index', [XemDanhGiaController::class, 'indexDG'])->name('danhgiaindex.index');

Route::prefix('customer')->name('customer.')->middleware('auth:customer')->group(function() {
    // Trang chủ
    Route::get('/home', function () {
        return view('khachhang.home');
    })->name('home');

    // Profile routes
    Route::prefix('profile')->group(function() {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('profile.password');
        Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('profile.password.update');
    });

    // Quản lý đơn hàng
    // Route::prefix('donhang')->group(function() {
    //     Route::get('/', [DonHangController::class, 'index'])->name('donhang.index');
    //     Route::get('/{id}', [DonHangController::class, 'show'])->name('donhang.show');
    //     Route::post('/{id}/huy', [DonHangController::class, 'cancel'])->name('donhang.cancel');
    // });

    Route::middleware('auth:customer')->group(function () {
        Route::get('/lich-su-don-hang', [DonHangController::class, 'lichSuDonHang'])->name('donhang.index');
    });

    // Hỗ trợ khách hàng
    Route::prefix('hotro')->group(function() {
        Route::get('/', [HoTroController::class, 'index'])->name('hotro.index');
        Route::post('/', [HoTroController::class, 'store'])->name('hotro.store');
        Route::get('/{id}', [HoTroController::class, 'show'])->name('hotro.show');
    });

    // Đánh giá
    Route::prefix('danhgia')->group(function() {
        Route::get('/', [DanhGiaController::class, 'index'])->name('danhgia.index');
        Route::post('/', [DanhGiaController::class, 'store'])->name('danhgia.store');
        Route::delete('/{id}', [DanhGiaController::class, 'destroy'])->name('danhgia.destroy');
    });
});
