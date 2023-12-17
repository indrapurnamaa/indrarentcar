<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MobilController;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});

// Route Login
Route::get('/login',   [AuthController::class, 'login'])->name('login');
Route::get('/register',   [AuthController::class, 'register'])->name('register');
Route::post('/login',   [AuthController::class, 'prosesLogin'])->name('proses.login');
Route::post('/register',   [AuthController::class, 'prosesRegister'])->name('proses.register');
Route::get('/logout',   [AuthController::class, 'logout'])->name('logout');

// Route Middleware untuk pengguna
Route::middleware(['auth:pengguna'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);
    
    // Route Mobil
    Route::resource('/mobil', \App\Http\Controllers\MobilController::class);
    Route::get('search', [MobilController::class, 'search'])->name('mobil.search');

    // Route Peminjaman
    Route::resource('/peminjaman', \App\Http\Controllers\PeminjamanController::class);

    // Route Pengembalian
    Route::resource('/pengembalian', \App\Http\Controllers\PengembalianController::class);
});
