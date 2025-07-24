<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Http\Requests\PatientRequest;
use Illuminate\Support\Facades\Hash;

/**
 * Class PatientController
 * @package App\Http\Controllers
 */
class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::paginate();

        return view('admin.patient.index', compact('patients'))
            ->with('i', (request()->input('page', 1) - 1) * $patients->perPage());
    }

    public function create()
    {
        $patient = new Patient();
        return view('admin.patient.create', compact('patient'));
    }

    public function store(PatientRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        Patient::create($request->validated());

        return redirect()->route('patients.index')
            ->with('success', 'Patient created successfully.');
    }

    public function show($id)
    {
        $patient = Patient::find($id);

        return view('admin.patient.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = Patient::find($id);

        return view('admin.patient.edit', compact('patient'));
    }

    public function update(PatientRequest $request, Patient $patient)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $patient->update($request->validated());

        return redirect()->route('patients.index')
            ->with('success', 'Patient updated successfully');
    }

    public function destroy($id)
    {
        Patient::find($id)->delete();

        return redirect()->route('patients.index')
            ->with('success', 'Patient deleted successfully');
    }
}
