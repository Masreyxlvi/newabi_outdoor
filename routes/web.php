<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProduksController;
use App\Http\Controllers\RegisterController;
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

// Route::get('/', function () {
//     return view('home');
// });

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
Route::get('/register', [RegisterController::class , 'index']);
Route::post('/register', [RegisterController::class , 'store']);

Route::get('/products', [ProduksController::class , 'index']);
Route::get('/categories', [CategoriesController::class , 'index']);
Route::get('/check_out', [PesananController::class , 'check_out'])->middleware('auth');
Route::get('/riwayat', [PesananController::class , 'riwayat'])->middleware('auth');
Route::get('/faktur/{pesanan:kode_pesanan}', [PesananController::class , 'faktur'])->middleware('auth');
Route::post('/konfirmasi', [PesananController::class , 'konfirmasi'])->middleware('auth');
Route::delete('/check_out/{id}', [PesananController::class , 'delete'])->middleware('auth');

Route::get('/products/{produk:nama_produk}', [ProduksController::class , 'show']);
Route::get('/categories/{kategori:nama_kategori}', [CategoriesController::class , 'show']);
Route::post('/products/{produk:nama_produk}', [PesananController::class , 'store'])->middleware('auth');
