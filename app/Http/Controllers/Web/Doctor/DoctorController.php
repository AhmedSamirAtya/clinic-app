<?php

namespace App\Http\Controllers\Web\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PatientHistory;
use App\Models\Prescription;
use Illuminate\Http\Request;
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

    public function getAppointments()
    {
        if (Auth::guard('doctor')->check()) {
            $user = Auth::guard('doctor')->user();
            $appointments = [];
            $appointments = Appointment::with(['patient', 'clinic'])->where('doctor_id', $user->id)->get();
        }
        return view('doctor.views.appointments', compact('appointments'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function appointment(Appointment $appointment)
    {
        return view('doctor.views.appointment', compact('appointment'));
    }

    public function showAddOrEditPrescription(int $appointment_id)
    {
        $prescription = Prescription::with(['appointment', 'appointment.patient'])->where('appointment_id', $appointment_id)->first();
        return view('doctor.views.add_or_edit_prescription', compact('prescription'));
    }

    public function addPrescription(Request $request)
    {
        $prescription = Prescription::create($request->all());
        $patientId = Appointment::find($request->appointment_id)->patient_id;
        PatientHistory::create([
            'patient_id' => $patientId,
            'prescription_id' => $prescription->id
        ]);
        return redirect()->route('doctor.appointments')->with(['success' => 'added']);
    }

    public function editPrescription(Request $request)
    {
        Prescription::find($request->prescription_id)->update($request->all());
        return redirect()->route('doctor.appointments')->with(['success' => 'edited']);
    }
}
