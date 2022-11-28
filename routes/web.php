<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->middleware('guest');
Route::redirect('/', '/admin')->middleware('auth');
Route::view('/admin', 'admin')->name('admin')->middleware('auth');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::view('/login', 'login')->middleware('guest');
Route::view('/register', 'register')->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::view('/reset-email', 'reset-email')->name('reset.email');
Route::view('/reset-password', 'reset-email')->name('reset.password');
