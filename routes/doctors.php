<?php

use App\Http\Controllers\Web\Doctor\DoctorController;
use App\Http\Controllers\Web\Doctor\Auth\DoctorLoginController as AuthDoctorLoginController;
use Illuminate\Support\Facades\Route;


Route::prefix('doctor')->name('doctor.')->group(function () {
    Route::middleware('IsDoctor')->group(function () {
        Route::get('/patients',  [DoctorController::class, 'getPatients'])->name('patients');
        Route::get('/patient/{patient}',  [DoctorController::class, 'patient'])->name('patient');
        Route::get('/appointments',  [DoctorController::class, 'getAppointments'])->name('appointments');
        Route::get('/appointment/{appointment}',  [DoctorController::class, 'appointment'])->name('appointment.show');
        Route::get('/appointment-edit-prescription/{appointment_id}',  [DoctorController::class, 'showAddOrEditPrescription'])->name('appointment.edit_prescreiption');
        Route::post('/add-prescreption',  [DoctorController::class, 'addPrescription'])->name('add_prescreption');
        Route::post('/edit-prescreption',  [DoctorController::class, 'editPrescription'])->name('edit_prescreption');
        Route::view('/dashboard', 'doctor.views.dashboard')->name('dashboard');
    });
    Route::middleware('RedirectIfAuthenticated:doctor')->group(function () {
        Route::get('/login',  [AuthDoctorLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login',  [AuthDoctorLoginController::class, 'permitLogin']);
        Route::get('/register',  [AuthDoctorLoginController::class, 'showRegisterationForm'])->name('register');
        Route::post('/register',  [AuthDoctorLoginController::class, 'register']);
    });
});
