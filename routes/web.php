<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PotensiController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/struktur-organisasi', [PageController::class, 'struktur'])->name('struktur');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/pemerintahan', [PageController::class, 'pemerintahan'])->name('pemerintahan');
Route::get('/potensi', [PotensiController::class, 'index'])->name('potensi');
Route::get('/bumdes', [PageController::class, 'bumdes'])->name('bumdes');
Route::get('/berita', [PageController::class, 'berita'])->name('berita');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/admin/login', [PageController::class, 'adminlogin'])->name('admin.login');
Route::get('/admin/dashboard', [PageController::class, 'admindashboard'])->name('admin.dashboard');
Route::get('/kekayaan', [PageController::class, 'kekayaan'])->name('kekayaan');

//require __DIR__.'/admin.php';