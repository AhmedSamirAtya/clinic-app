<?php

use App\Http\Controllers\Assistant\Auth\AssistantRegisterController;
use App\Http\Controllers\Assistant\Auth\AssistantLoginController;
use Illuminate\Support\Facades\Route;


Route::prefix('assistant')->name('assistant.')->group(function () {
    Route::middleware('IsAssistant')->group(function () {
        Route::view('/dashboard', 'assistant.dashboard')->name('dashboard');
    });
    Route::middleware('RedirectIfAuthenticated:assistant')->group(function () {
        Route::get('/login',  [AssistantLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login',  [AssistantLoginController::class, 'permitLogin']);
        Route::get('/register',  [AssistantRegisterController::class, 'showRegisterationForm'])->name('register');
        Route::post('/register',  [AssistantRegisterController::class, 'register']);
    });
});
