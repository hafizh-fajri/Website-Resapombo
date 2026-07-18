<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BumdesController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/struktur-organisasi', [PageController::class, 'struktur'])->name('struktur');
Route::get('/layanan', [PageController::class, 'layanan'])->name('layanan');
Route::get('/bumdes', [BumdesController::class, 'index'])->name('bumdes');

require __DIR__.'/admin.php';