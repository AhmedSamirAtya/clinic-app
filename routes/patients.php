<?php

use App\Http\Controllers\Patient\Auth\PatientRegisterController;
use App\Http\Controllers\Patient\Auth\PatientLoginController;
use App\Http\Controllers\Web\Admin\PatientController;
use App\Http\Controllers\Web\Patient\Auth\PatientLoginController as AuthPatientLoginController;
use Illuminate\Support\Facades\Route;


Route::prefix('patient')->name('patient.')->group(function () {
    Route::middleware('IsPatient')->group(function () {
        Route::get('/appointments',  [PatientController::class, 'getAppointments'])->name('appointments');
        Route::get('/doctors',  [PatientController::class, 'getDoctors'])->name('doctors');
        Route::view('/dashboard', 'patient.dashboard')->name('dashboard');
    });
    Route::middleware('RedirectIfAuthenticated:patient')->group(function () {
        Route::get('/login',  [AuthPatientLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login',  [AuthPatientLoginController::class, 'permitLogin']);
        Route::get('/register',  [AuthPatientLoginController::class, 'showRegisterationForm'])->name('register');
        Route::post('/register',  [AuthPatientLoginController::class, 'register']);
    });
});
