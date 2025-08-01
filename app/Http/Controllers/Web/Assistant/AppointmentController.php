<?php

namespace App\Http\Controllers\Web\Assistant;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Models\Assistant;
use App\Http\Requests\Assistant\AssistantRequest;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\ClinicDoctor;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function createAppointment()
    {
        $appointment = new Appointment();
        $clinic = Assistant::find(Auth::guard('assistant')->id())->clinic;
        return view('assistant.appointment.create', compact('appointment', 'clinic'));
    }

    public function storeAppointment(AppointmentRequest $request)
    {
        Appointment::create($request->validated());
        return redirect()->route('assistants.appointments.get-appointments')
            ->with('success', 'Appointment created successfully.');
    }

    public function appointments(Request $request)
    {
        $appointments = Appointment::with(['patient', 'doctor'])->where('clinic_id', Auth::guard('assistant')->user()->clinic_id)->paginate();
        return view('assistant.appointment.index', compact('appointments'))
            ->with('i', (request()->input('page', 1) - 1) * $appointments->perPage());
    }

    public function viewAppointment($id)
    {
        $appointment = Appointment::with(['patient', 'doctor', 'prescription'])->find($id);
        return view('assistant.appointment.show', compact('appointment'));
    }

    public function edit($id)
    {
        $appointment = Appointment::find($id);
        return view('assistant.appointment.edit', compact('appointment'));
    }

    public function updateAppointment(AppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->validated());
        return redirect()->route('assistant.appointments.index')
            ->with('success', 'Appointment updated successfully');
    }

    public function destroy($id)
    {
        Appointment::find($id)->delete();
        return redirect()->route('assistant.appointments.index')
            ->with('success', 'Appointment deleted successfully');
    }

     public function getDoctorSchedule(Request $request, Doctor $doctor)
    {
        // 1. Get the clinic ID of the currently logged-in assistant.
        $clinicId = Auth::guard('assistant')->user()->clinic_id;

        // 2. Find the specific ClinicDoctor record for this doctor and clinic.
        $clinicDoctor = ClinicDoctor::where('doctor_id', $doctor->id)
                                    ->where('clinic_id', $clinicId)
                                    ->first();

        // 3. Handle the case where no schedule is found.
        if (!$clinicDoctor) {
            return response()->json([
                'error' => 'Doctor not found for this clinic.',
                'schedule' => null
            ], 404); // Return a 404 Not Found response
        }

        // 4. Return the schedule data as a JSON response.
        return response()->json([
            'schedule' => [
                // The working_days field is likely a JSON string, so we decode it.
                'working_days' => $clinicDoctor->working_days,
                'start_time' => $clinicDoctor->start_time,
                'end_time' => $clinicDoctor->end_time,
                // A good default interval for appointments. This can be stored in the DB too.
                'appointment_interval' => 30
            ]
        ]);
    }
}
