<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BumdesController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PotensiDesaController;
use App\Http\Controllers\PemerintahanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\Admin\ProfilController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/bumdes', [BumdesController::class, 'index'])->name('bumdes');
Route::get('/kekayaan-desa', [PotensiController::class, 'index'])->name('kekayaan');
Route::get('/berita', [ArtikelController::class, 'index'])->name('berita');
Route::get('/berita/{artikel}', [ArtikelController::class, 'show'])->name('berita.show');
Route::get('/potensi', [PotensiDesaController::class, 'index'])->name('potensi');
Route::get('/pemerintahan', [PemerintahanController::class, 'index'])->name('pemerintahan');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');

Route::get('/admin1/login', [PageController::class, 'adminlogin'])->name('admin1.login');
Route::get('/admin1/dashboard', [PageController::class, 'admindashboard'])->name('admin1.dashboard');
Route::post('/admin1/fakta-singkat', [PageController::class, 'fsupdate'])->name('admin1.fakta-singkat.update');
Route::post('/admin1/kontak-bumdes', [PageController::class, 'kbupdate'])->name('admin1.kontak-bumdes.update');
require __DIR__.'/admin.php';