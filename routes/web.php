<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/register', [RegisterController::class, 'index'])->name('register');
Route::post('/auth/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/auth/login', [LoginController::class, 'index'])->name('login');

Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request){
    // Fulfill the email verification request
    $request->fulfill();
    return redirect('/auth/login');

})->middleware(['auth','signed'])->name('verification.verify');
