<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BumdesController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\ArtikelController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/struktur-organisasi', [PageController::class, 'struktur'])->name('struktur');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/bumdes', [BumdesController::class, 'index'])->name('bumdes');
Route::get('/potensi', [PotensiController::class, 'index'])->name('potensi');
Route::get('/berita', [ArtikelController::class, 'index'])->name('berita');

require __DIR__.'/admin.php';