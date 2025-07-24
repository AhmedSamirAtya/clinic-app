<?php

use App\Http\Controllers\Assistant\Auth\AssistantRegisterController;
use App\Http\Controllers\Assistant\Auth\AssistantLoginController;
use App\Http\Controllers\Web\Assistant\Auth\AssistantLoginController as AuthAssistantLoginController;
use Illuminate\Support\Facades\Route;


Route::prefix('assistant')->name('assistant.')->group(function () {
    Route::middleware('IsAssistant')->group(function () {
        Route::view('/dashboard', 'assistant.dashboard')->name('dashboard');
    });
    Route::middleware('RedirectIfAuthenticated:assistant')->group(function () {
        Route::get('/login',  [AuthAssistantLoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login',  [AuthAssistantLoginController::class, 'permitLogin']);
        Route::get('/register',  [AuthAssistantLoginController::class, 'showRegisterationForm'])->name('register');
        Route::post('/register',  [AuthAssistantLoginController::class, 'register']);
    });
});
