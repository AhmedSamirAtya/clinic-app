<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\PatientRequest;

/**
 * Class PatientController
 * @package App\Http\Controllers
 */
class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::paginate();

        return view('patient.index', compact('patients'))
            ->with('i', (request()->input('page', 1) - 1) * $patients->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patient = new Patient();
        return view('patient.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request)
    {
        Patient::create($request->validated());

        return redirect()->route('patients.index')
            ->with('success', 'Patient created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patient = Patient::find($id);

        return view('patient.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = Patient::find($id);

        return view('patient.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, Patient $patient)
    {
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
