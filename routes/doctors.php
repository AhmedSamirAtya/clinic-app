<?php

use App\Http\Controllers\Doctor\Auth\DoctorRegisterController;
use App\Http\Controllers\Doctor\Auth\DoctorLoginController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::prefix('doctor')->name('doctor.')->group(function () {
    Route::middleware('IsDoctor')->group(function () {
        Route::view('/dashboard', 'doctor.dashboard')->name('dashboard');
    });
    //Route::view('/login', 'doctor.auth.login')->name('login');
    Route::get('/login',  [DoctorLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login',  [DoctorLoginController::class, 'permitLogin']);
    //Route::view('/register', 'doctor.auth.register')->name('register');
    Route::get('/register',  [DoctorRegisterController::class, 'showRegisterationForm'])->name('register');
    Route::post('/register',  [DoctorRegisterController::class, 'register']);
});
