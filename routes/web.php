<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\AssistantController;
use App\Http\Controllers\Admin\ClinicController;
use App\Http\Controllers\Admin\ClinicDoctorController;
use App\Http\Controllers\Admin\ClinicUserController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\NurseController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\PatientHistoryController;
use App\Http\Controllers\Admin\PrescriptionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    "verify" => true
]);

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('assistants', AssistantController::class);
    Route::resource('nurses', NurseController::class);
    Route::resource('clinics', ClinicController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('medicines', MedicineController::class);
    Route::resource('prescriptions', PrescriptionController::class);
    Route::resource('patient-histories', PatientHistoryController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('clinic-doctors', ClinicDoctorController::class);
    Route::resource('doctors', DoctorController::class);
    Route::get('/{page}',  [AdminController::class, 'index']);
});


Route::get('/', function () {
    return view('index');
});
