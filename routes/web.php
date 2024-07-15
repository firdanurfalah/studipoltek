<?php

use App\Http\Controllers\cobaController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReferensiController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

Auth::routes();
Route::post('coba/pay', [cobaController::class, 'pay'])->name('coba.pay');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('adminxxx', AdminController::class);
    Route::resource('categori', CategoriController::class);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('product', ProductController::class);
    Route::resource('admin-promo', PromoController::class);
    Route::resource('admin-referensi', ReferensiController::class);
    Route::post('/approve-booking/{id}', [App\Http\Controllers\Front\HomeController::class, 'approvebooking']);
});

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

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});



// Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin');
// Route::get('/categori', [App\Http\Controllers\CategoriController::class, 'index'])->name('categori');
// Route::get('/artikel', [App\Http\Controllers\ArtikelController::class, 'create'])->name('artikel');
// Route::get('/booking', [App\Http\Controllers\BookingController::class, 'create'])->name('booking');

Route::get('/register-user', [App\Http\Controllers\Front\HomeController::class, 'register']);
Route::get('/history-booking', [App\Http\Controllers\Front\UserController::class, 'historybooking']);
Route::get('/konfirmasijam', [App\Http\Controllers\Front\UserController::class, 'konfirmasijam']);
Route::resource('profile', UserController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index']);
Route::get('/categori/{id}/detail', [App\Http\Controllers\Front\HomeController::class, 'categoridetail']);
Route::get('/form-booking', [App\Http\Controllers\Front\HomeController::class, 'formbooking']);
Route::get('/produk/{id}', [App\Http\Controllers\Front\HomeController::class, 'produkdetail']);
Route::get('/checktanggal', [App\Http\Controllers\Front\HomeController::class, 'checktanggal']);
Route::get('/setfavorit/{productid}', [App\Http\Controllers\Front\HomeController::class, 'setfavorit']);
Route::post('/proses-booking', [App\Http\Controllers\Front\HomeController::class, 'prosesbooking']);
Route::post('/edit-jam', [App\Http\Controllers\Front\HomeController::class, 'editjam']);
Route::post('/upload-bukti', [App\Http\Controllers\Front\HomeController::class, 'uploadbukti']);

Route::post('/payment', [PaymentController::class, 'payment'])->name('payment');

Route::get('/cari-produk', [App\Http\Controllers\Front\HomeController::class, 'cariproduk']);
Route::get('/katalog-studio', [App\Http\Controllers\Front\HomeController::class, 'katalogstudio']);
Route::get('/referensi', [App\Http\Controllers\Front\HomeController::class, 'referensi']);
Route::get('/referensi-detail/{id}', [App\Http\Controllers\Front\HomeController::class, 'referensidetail']);
Route::get('/promo', [App\Http\Controllers\Front\HomeController::class, 'promo']);
Route::get('/kontak', function () {
    return view('front.pages.contacs');
});

route::get('gambar', function (Request $r) {
    return Storage::download($r->rf);
});

