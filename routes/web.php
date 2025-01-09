<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::view('login','login')->name('login')->middleware(RedirectIfAuthenticated::class);
Route::post('/loginUser', [AuthController::class, 'login'])->name('loginUser');

Route::view('register','register')->name('register')->middleware(RedirectIfAuthenticated::class);
Route::post('/registerUser', [AuthController::class, 'register'])->name('registerUser');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('companies', CompanyController::class);

Route::fallback(function(){
    return "Not Route Fount";
}, 401);

