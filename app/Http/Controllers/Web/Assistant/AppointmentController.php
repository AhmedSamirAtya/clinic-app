<?php

namespace App\Http\Controllers\Web\Assistant;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Models\Assistant;
use App\Http\Requests\Assistant\AssistantRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function createAppointment()
    {
        $appointment = new Appointment();
        return view('assistant.appointment.create', compact('appointment'));
    }

    public function storeAppointment(AppointmentRequest $request)
    {
        Appointment::create($request->validated());
        return redirect()->route('assistant.appointments.index')
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
}
