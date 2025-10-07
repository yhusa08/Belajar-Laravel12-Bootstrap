<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DataPeminjamController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('kategoris', KategoriController::class);
Route::resource('pinjams', PinjamController::class);
Route::resource('books', BookController::class);
Route::resource('data_peminjams', DataPeminjamController::class);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::post('/profile', [App\Http\Controllers\HomeController::class, 'update_avatar'])->name('update_avatar');
Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('settings');
Route::get('/reports', [App\Http\Controllers\HomeController::class, 'reports'])->name('reports');
Route::get('/notifications', [App\Http\Controllers\HomeController::class, 'notifications'])->name('notifications');
Route::get('/help', [App\Http\Controllers\HomeController::class, 'help'])->name('help');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');