<?php

use App\Http\Controllers\Doctor\Auth\DoctorRegisterController;
use App\Http\Controllers\Doctor\Auth\DoctorLoginController;
use App\Http\Controllers\Doctor\DoctorController as DoctorDoctorController;
use App\Http\Controllers\DoctorController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::prefix('doctor')->name('doctor.')->group(function () {
    Route::middleware('IsDoctor')->group(function () {
        Route::get('/patients',  [DoctorDoctorController::class, 'getPatients'])->name('patients');
        Route::get('/patient/{patient}',  [DoctorDoctorController::class, 'patient'])->name('patient');
        Route::view('/dashboard', 'doctor.views.dashboard')->name('dashboard');
    });
    Route::middleware('RedirectIfAuthenticated:doctor')->group(function () {
        Route::get('/login',  [DoctorLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login',  [DoctorLoginController::class, 'permitLogin']);
        Route::get('/register',  [DoctorRegisterController::class, 'showRegisterationForm'])->name('register');
        Route::post('/register',  [DoctorRegisterController::class, 'register']);
    });
});
