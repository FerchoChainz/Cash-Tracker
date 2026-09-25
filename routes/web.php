<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
// Register Routes
Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'store'])->name('register.store');

// Login Routes
Route::get('/auth/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth/login', [LoginController::class, 'store'])->name('login.store');

// Email Verification Routes
Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
    // Fulfill the email verification request
    $request->fulfill();
    return redirect('dashboard')->with('success', 'Your email has been verified successfully. You can now access your dashboard.');

})->middleware(['auth','signed'])->name('verification.verify');

Route::get('/email/verify', function(){
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::post('/email/verification-notification', function(Request $request){
    $request->user()->sendEmailVerificationNotification();

    return back()->with('success', 'A new verification link has been sent to your email address.');
})->middleware(['auth', 'throttle:2,1'])->name(('verification.send'));

// Resend Verification Email Route
Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');
