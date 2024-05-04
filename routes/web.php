<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\ClinicDoctorController;
use App\Http\Controllers\ClinicUserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientHistoryController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\UserController;
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
Route::group(['middleware' => ['auth']], function () {
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

    //Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


    Route::get('/{page}',  [AdminController::class, 'index']);
});


Route::get('/', function () {
    return view('index');
});

require __DIR__ . '/doctors.php';
