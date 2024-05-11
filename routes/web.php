<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\AssistantController;
use App\Http\Controllers\Admin\ClinicController;
use App\Http\Controllers\Admin\ClinicDoctorController;
use App\Http\Controllers\Admin\ClinicUserController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\NurseController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\PatientHistoryController;
use App\Http\Controllers\Admin\PrescriptionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes([
    "verify" => true
]);

//Route::get('/home', [HomeController::class, 'index'])->name('home');
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
    Route::resource('clinic-users', ClinicUserController::class);
    Route::resource('clinic-doctors', ClinicDoctorController::class);
    Route::resource('doctors', DoctorController::class);
    Route::get('/{page}',  [AdminController::class, 'index']);
});


Route::get('/', function () {
    return view('index');
});

Route::get('/redirect/{service}', [SocialiteController::class, 'redirect']);
Route::get('/callback/{service}', [SocialiteController::class, 'callback']);
//require __DIR__ . '/doctors.php';
