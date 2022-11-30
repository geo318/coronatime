<?php

use App\Http\Controllers\ConfirmEmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::middleware('guest')->group(function () {
	Route::redirect('/', '/login');
	Route::view('/login', 'login')->name('login');
	Route::post('/login', [LoginController::class, 'login']);
	Route::view('/register', 'register')->name('register');
	Route::post('/register', [RegisterController::class, 'store']);
	Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
	Route::post('/forgot-password', [ResetPasswordController::class, 'postEmail'])->name('password.email');
	Route::get('/reset-password/{token}', [ResetPasswordController::class, 'postNewPassword'])->name('password.reset');
	Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
});

Route::middleware(['auth', 'verified'])->group(function () {
	Route::redirect('/', '/admin');
	Route::get('/admin/world', [StatsController::class, 'sum'])->name('admin.world');
	Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::view('/email/verify', 'auth.verify-email')->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [ConfirmEmailController::class, 'sendEmail'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [ConfirmEmailController::class, 'resendEmail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
