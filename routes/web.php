<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::redirect('/', '/login')->middleware('guest');
Route::redirect('/', '/admin')->middleware('auth');
Route::view('/admin', 'admin')->name('admin')->middleware('auth');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout')->middleware(['auth', 'verified']);
Route::post('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::view('/login', 'login')->middleware('guest');
Route::view('/register', 'register')->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::view('/email/reset', 'reset.send')->name('reset.email');
Route::view('/reset-password', 'reset.password')->name('reset.password');

//notification controller
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//send hash mail
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect(route('admin'));
})->middleware(['auth', 'signed'])->name('verification.verify');

//resend
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');