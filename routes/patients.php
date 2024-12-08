<?php

use App\Http\Controllers\Patient\Auth\PatientRegisterController;
use App\Http\Controllers\Patient\Auth\PatientLoginController;
use App\Http\Controllers\Patient\PatientController;
use Illuminate\Support\Facades\Route;


Route::prefix('patient')->name('patient.')->group(function () {
    Route::middleware('IsPatient')->group(function () {
        Route::get('/appointments',  [PatientController::class, 'getAppointments'])->name('appointments');
        Route::get('/doctors',  [PatientController::class, 'getDoctors'])->name('doctors');
        Route::view('/dashboard', 'patient.dashboard')->name('dashboard');
    });
    Route::middleware('RedirectIfAuthenticated:patient')->group(function () {
        Route::get('/login',  [PatientLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login',  [PatientLoginController::class, 'permitLogin']);
        Route::get('/register',  [PatientRegisterController::class, 'showRegisterationForm'])->name('register');
        Route::post('/register',  [PatientRegisterController::class, 'register']);
    });
});
