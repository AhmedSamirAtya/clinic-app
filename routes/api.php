<?php

use App\Http\Controllers\Api\Auth\PatientAuthController;
use App\Http\Controllers\Api\SpecializationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('patient')->group(function () {
    Route::post('/register', [PatientAuthController::class, 'register']);
    Route::post('/login', [PatientAuthController::class, 'login']);
    Route::prefix('specialization')->group(function () {
        Route::get('/index', [SpecializationController::class, 'index']);
    });
    Route::prefix('appointments')->group(function () {
        Route::get('/index', [SpecializationController::class, 'index']);
    });
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hi', function (Request $request) {
    dd('hi');
});
