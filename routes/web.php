<?php

use App\Http\Controllers\AlamatController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardPesananController;
use App\Http\Controllers\DashboardProdukController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProduksController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard.index', [
			'title' => "DASHBOARD"
		]);
})->middleware('role:admin');

Route::resource('/dashboard/user', DashboardUserController::class)->middleware('role:admin');
Route::resource('/dashboard/produk', DashboardProdukController::class)->middleware('role:admin');
Route::resource('/dashboard/pesanan', DashboardPesananController::class)->middleware('role:admin');
Route::get('/dashboard/pesanan/faktur/{pesanan:kode_pesanan}', [DashboardPesananController::class , 'faktur'])->middleware('role:admin');
Route::get('/dashboard/pesanan/cetakPdf/{cetakPdf}', [DashboardPesananController::class , 'cetakPdf'])->middleware('role:admin');
Route::post('/dashboard/pesanan/diskon/{pesanan:kode_pesanan}', [DashboardPesananController::class , 'diskon'])->middleware('role:admin');

// login with google 
Route::get('/google', [GoogleController::class, 'redirect'])->name('login.google');
Route::get('/google/call-back', [GoogleController::class, 'callbackGoogle']);
// login with Facebook


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/', [HomeController::class , 'index']);
Route::get('/contact', function(){
		return view('contact');
});
Route::get('/coba', function(){
		return view('coba');
});

// user
Route::post('/register', [RegisterController::class , 'store']);
Route::put('/user/{user}', [UserController::class , 'editAlamat']);
Route::get('/profile/', [UserController::class , 'profile']);

// transaksi
Route::get('/check_out', [PesananController::class , 'check_out'])->middleware('auth');
Route::get('/riwayat', [PesananController::class , 'riwayat'])->middleware('auth');
Route::get('/faktur/{pesanan:kode_pesanan}', [PesananController::class , 'faktur'])->middleware('auth');
Route::get('/success', [PesananController::class , 'success'])->middleware('auth');
Route::post('/konfirmasi', [PesananController::class , 'konfirmasi'])->middleware('auth');
Route::get('/whatsapp', [PesananController::class , 'whatsapp'])->middleware('auth');
Route::delete('/check_out/{id}', [PesananController::class , 'delete'])->middleware('auth');
// all Product
Route::get('/products/', [ProduksController::class , 'index']);
// Categori
Route::get('/categories', [CategoriesController::class , 'index']);
Route::get('/categories/{kategori:nama_kategori}', [CategoriesController::class , 'show']);
// product Detail
Route::get('/products/{produk:nama_produk}', [ProduksController::class , 'show']);
Route::post('/products/{produk:nama_produk}', [PesananController::class , 'store'])->middleware('auth');


// AJAX ALAMAT
Route::get('/get-provinsi', [AlamatController::class, 'getProvinsi']);
Route::post('/get-kabupaten', [AlamatController::class, 'getKabupaten']);
Route::post('/get-kecamatan', [AlamatController::class, 'getKecamatan']);
Route::post('/get-desa', [AlamatController::class, 'getDesa']);

// import
Route::post('/dashboard/produk/import', [ProduksController::class, 'import']);