<?php

use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Web\Admin\AdminController;
use App\Http\Controllers\Web\Admin\AppointmentController;
use App\Http\Controllers\Web\Admin\AssistantController;
use App\Http\Controllers\Web\Admin\Auth\LoginController;
use App\Http\Controllers\Web\Admin\ClinicController;
use App\Http\Controllers\Web\Admin\ClinicDoctorController;
use App\Http\Controllers\Web\Admin\DoctorController;
use App\Http\Controllers\Web\Admin\LocationController;
use App\Http\Controllers\Web\Admin\MedicineController;
use App\Http\Controllers\Web\Admin\NurseController;
use App\Http\Controllers\Web\Admin\PatientController;
use App\Http\Controllers\Web\Admin\PatientHistoryController;
use App\Http\Controllers\Web\Admin\PrescriptionController;
use App\Http\Controllers\Web\Admin\RoleController;
use App\Http\Controllers\Web\Admin\SpecializationController;
use App\Http\Controllers\Web\Admin\SpecializationsDoctorController;
use App\Http\Controllers\Web\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// Auth::routes([
//    // "verify" => true,
//     'login' => 'App\Http\Controllers\Admin\Auth\LoginController@showLoginForm',
//     'logout' => 'App\Http\Controllers\Admin\Auth\LoginController@logout',
// ]);



Route::get('/pay', [PaymentController::class, 'initiatePayment'])->name('pay');
Route::match(['get', 'post'], '/paymob/callback', [PaymentController::class, 'callback'])->name('paymob.callback');


Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('specializations', SpecializationController::class);
    Route::resource('specializations-doctors', SpecializationsDoctorController::class);
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
    Route::resource('appointments', AppointmentController::class);
    Route::resource('clinic-doctors', ClinicDoctorController::class);
    Route::resource('doctors', DoctorController::class);
    Route::get('/{page}',  [AdminController::class, 'index']);
});


Route::get('/', function () {
    return view('index');
});
