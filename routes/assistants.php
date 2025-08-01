<?php

use App\Http\Controllers\Assistant\Auth\AssistantRegisterController;
use App\Http\Controllers\Web\Assistant\AppointmentController;
use App\Http\Controllers\Web\Assistant\Auth\AssistantLoginController;
use App\Http\Controllers\Web\Assistant\ClinicDoctorController;
use Illuminate\Support\Facades\Route;


Route::prefix('assistants')->name('assistants.')->group(function () {
    Route::middleware('IsAssistant')->group(function () {
        Route::view('/dashboard', 'assistant.dashboard')->name('dashboard');
        Route::get('/show-doctors-table', [ClinicDoctorController::class, 'getDoctorsTable'])->name('show-doctors-table');
        Route::prefix('appointments')->name('appointments.')->group(function () {
            Route::get('/', [AppointmentController::class, 'appointments'])->name('get-appointments');
            Route::get('/create', [AppointmentController::class, 'createAppointment'])->name('create-appointment');
            Route::post('/store', [AppointmentController::class, 'storeAppointment'])->name('store-appointment');
            Route::get('/{appointment}', [AppointmentController::class, 'viewAppointment'])->name('view-appointment');
            Route::get('/{appointment}/edit', [AppointmentController::class, 'edit'])->name('edit-appointment');
            Route::post('/{appointment}/update', [AppointmentController::class, 'updateAppointment'])->name('update-appointment');
            Route::post('/{appointment}/update', [AppointmentController::class, 'updateAppointment'])->name('update-appointment');
            Route::delete('/{appointment}', [AppointmentController::class, 'destroy'])->name('destroy-appointment');
            Route::get('/get-doctor-schedule/{doctor}', [AppointmentController::class, 'getDoctorSchedule'])
    ->name('assistants.get_doctor_schedule');
        });
    });
    Route::middleware('RedirectIfAuthenticated:assistant')->group(function () {
        Route::get('/login',  [AssistantLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login',  [AssistantLoginController::class, 'permitLogin']);
        Route::get('/register',  [AssistantLoginController::class, 'showRegisterationForm'])->name('register');
        Route::post('/register',  [AssistantLoginController::class, 'register']);
    });
});
