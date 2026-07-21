<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BumdesController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PotensiDesaController;
use App\Http\Controllers\PemerintahanController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/bumdes', [BumdesController::class, 'index'])->name('bumdes');
Route::get('/kekayaan-desa', [PotensiController::class, 'index'])->name('kekayaan');
Route::get('/berita', [ArtikelController::class, 'index'])->name('berita');
Route::get('/berita/{artikel}', [ArtikelController::class, 'show'])->name('berita.show');
Route::get('/potensi', [PotensiDesaController::class, 'index'])->name('potensi');
Route::get('/pemerintahan', [PemerintahanController::class, 'index'])->name('pemerintahan');

require __DIR__.'/admin.php';