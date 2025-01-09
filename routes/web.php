<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\DropdownController;

Route::view('login','login')->name('login')->middleware(RedirectIfAuthenticated::class);
Route::post('/loginUser', [AuthController::class, 'login'])->name('loginUser');

Route::view('register','register')->name('register')->middleware(RedirectIfAuthenticated::class);
Route::post('/registerUser', [AuthController::class, 'register'])->name('registerUser');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('companies', CompanyController::class);

// Route::get('get-countries', [DropdownController::class, 'getCountries']);
Route::post('/get-states', [DropdownController::class, 'getStates']);
Route::post('/get-cities', [DropdownController::class, 'getCities']);

Route::fallback(function(){
    return "Not Route Fount";
}, 401);

