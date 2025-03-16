<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengukuranController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\ProfilController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return redirect('/login');
});

// Gunakan HomeController untuk menampilkan menu.home
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
// Route untuk menyimpan data
Route::post('/home/store', [HomeController::class, 'store'])->middleware('auth')->name('home.store');
Route::get('/pengukuran', [PengukuranController::class, 'index'])->middleware('auth')->name('pengukuran');
Route::get('/riwayat', [RiwayatController::class, 'index'])->middleware('auth')->name('riwayat');
Route::get('/profil', [ProfilController::class, 'index'])->middleware('auth')->name('profil');
Route::post('/profil/update', [ProfilController::class, 'update'])->middleware('auth')->name('profil.update');
