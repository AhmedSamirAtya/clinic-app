<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Factory;

class DoctorController extends Controller
{
    public function getPatients()
    {
        if (Auth::guard('doctor')->check()) {
            $user = Auth::guard('doctor')->user();
            $patients = [];
            $appointments = Appointment::with('patient')->where('doctor_id', $user->id)->get();
            foreach ($appointments as $app) {
                array_push($patients, $app->patient);
            }
        }
        return view('doctor.views.patients', compact('patients'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function patient(Patient $patient)
    {
        return view('doctor.views.patient', compact('patient'));
    }
}
