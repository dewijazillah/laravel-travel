<?php

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

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PembeliController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/store', [AuthController::class, 'tambahUser'])->name('tambahUser');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::group(['middleware' => 'staff.session'],function () {    
    Route::get('/konfirmasi', [StaffController::class, 'konfirmasi'])->name('konfirmasi');
    Route::get('/konfirmasi-pemesanan/{id}', [StaffController::class, 'konfirmasiPembelian'])->name('konfirmasiPembelian');

});

Route::group(['middleware' => 'user.session'],function () {
    Route::get('/pesan', [PembeliController::class, 'pesan'])->name('pesan');
    Route::post('/pesan-tour', [PembeliController::class, 'storePesan'])->name('storePesan');
    Route::get('/history', [PembeliController::class, 'history'])->name('history');

});
