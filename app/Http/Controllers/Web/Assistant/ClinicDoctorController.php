<?php

namespace App\Http\Controllers\Web\Assistant;

use App\Http\Controllers\Controller;
use App\Models\ClinicDoctor;
use App\Http\Requests\ClinicDoctorRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class ClinicDoctorController
 * @package App\Http\Controllers
 */
class ClinicDoctorController extends Controller
{
    public function getDoctorsTable()
    {
        $clinicDoctorsGrouped = ClinicDoctor::where('clinic_id', Auth::guard('assistant')->user()->clinic_id)->with(['doctor', 'clinic'])->get()->groupBy('doctor_id');
        return view('assistant.doctors_table', compact('clinicDoctorsGrouped'));
    }
}






