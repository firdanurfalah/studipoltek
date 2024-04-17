<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

Auth::routes();


Route::resource('adminxxx', AdminController::class);
Route::resource('categori', CategoriController::class);
Route::resource('artikel', ArtikelController::class);
Route::resource('booking', BookingController::class);

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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index']);
Route::get('/categori/{id}/detail', [App\Http\Controllers\Front\HomeController::class, 'categoridetail']);
Route::get('/form-booking', [App\Http\Controllers\Front\HomeController::class, 'formbooking']);
Route::post('/proses-booking', [App\Http\Controllers\Front\HomeController::class, 'prosesbooking']);
Route::post('/approve-booking/{id}', [App\Http\Controllers\Front\HomeController::class, 'approvebooking']);
// Route::get('/', function () {
//     return view('front.beranda');
// });
Route::get('/about', function () {
    return view('front.pages.about');
});
Route::get('/kategori', function () {
    return view('front.pages.categories');
});
Route::get('/promo', function () {
    return view('front.pages.promo');
});
Route::get('/kontak', function () {
    return view('front.pages.contacs');
});

route::get('gambar', function (Request $r) {
    return Storage::download($r->rf);
});
