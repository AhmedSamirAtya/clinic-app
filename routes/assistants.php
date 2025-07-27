<?php

use App\Http\Controllers\Assistant\Auth\AssistantRegisterController;
use App\Http\Controllers\Assistant\Auth\AssistantLoginController;
use App\Http\Controllers\Web\Admin\AssistantController;
use App\Http\Controllers\Web\Assistant\Auth\AssistantLoginController as AuthAssistantLoginController;
use Illuminate\Support\Facades\Route;


Route::prefix('assistants')->name('assistants.')->group(function () {
    Route::middleware('IsAssistant')->group(function () {
        Route::view('/dashboard', 'assistant.dashboard')->name('dashboard');
        Route::prefix('appointments')->name('appointments.')->group(function () {
            Route::get('/', [AssistantController::class, 'appointments'])->name('get-appointments');
            Route::get('/create', [AssistantController::class, 'createAppointment'])->name('create-appointment');
            Route::post('/store', [AssistantController::class, 'storeAppointment'])->name('store-appointment');
            Route::get('/{appointment}', [AssistantController::class, 'viewAppointment'])->name('view-appointment');
            Route::get('/{appointment}/edit', [AssistantController::class, 'edit'])->name('edit-appointment');
            Route::post('/{appointment}/update', [AssistantController::class, 'updateAppointment'])->name('update-appointment');
            Route::post('/{appointment}/update', [AssistantController::class, 'updateAppointment'])->name('update-appointment');
            Route::delete('/{appointment}', [AssistantController::class, 'destroy'])->name('destroy-appointment');
        });
    });
    Route::middleware('RedirectIfAuthenticated:assistant')->group(function () {
        Route::get('/login',  [AuthAssistantLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login',  [AuthAssistantLoginController::class, 'permitLogin']);
        Route::get('/register',  [AuthAssistantLoginController::class, 'showRegisterationForm'])->name('register');
        Route::post('/register',  [AuthAssistantLoginController::class, 'register']);
    });
});
