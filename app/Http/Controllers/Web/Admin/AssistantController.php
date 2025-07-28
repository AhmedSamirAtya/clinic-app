<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Assistant;
use App\Http\Requests\Assistant\AssistantRequest;
use App\Models\Appointment;
use App\Models\Clinic;
use App\Models\ClinicDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssistantController extends Controller
{
    public function index()
    {
        $assistants = Assistant::with('clinic')->paginate();
        return view('admin.assistant.index', compact('assistants'))
            ->with('i', (request()->input('page', 1) - 1) * $assistants->perPage());
    }

    public function create()
    {
        $assistant = new Assistant();
        return view('admin.assistant.create', compact('assistant'));
    }

    public function store(AssistantRequest $request)
    {
        Assistant::create($request->validated());
        return redirect()->route('assistants.index')
            ->with('success', 'Assistant created successfully.');
    }

    public function appointments(Request $request)
    {
        $appointments = Appointment::with(['patient', 'doctor'])->where('clinic_id', Auth::guard('assistant')->user()->clinic_id)->paginate();
        return view('assistant.appointment.index', compact('appointments'))
            ->with('i', (request()->input('page', 1) - 1) * $appointments->perPage());
    }

    public function show($id)
    {
        $assistant = Assistant::find($id);
        return view('admin.assistant.show', compact('assistant'));
    }

    public function edit($id)
    {
        $assistant = Assistant::find($id);
        return view('admin.assistant.edit', compact('assistant'));
    }

    public function update(AssistantRequest $request, Assistant $assistant)
    {
        $assistant->update($request->validated());
        return redirect()->route('assistants.index')
            ->with('success', 'Assistant updated successfully');
    }

    public function destroy($id)
    {
        Assistant::find($id)->delete();
        return redirect()->route('assistants.index')
            ->with('success', 'Assistant deleted successfully');
    }

    public function getDoctorsTable()
    {
        $clinicDoctorsGrouped = ClinicDoctor::where('clinic_id', Auth::guard('assistant')->user()->clinic_id)->with(['doctor', 'clinic'])->get()->groupBy('doctor_id');
        return view('assistant.doctors_table', compact('clinicDoctorsGrouped'));
    }
}
