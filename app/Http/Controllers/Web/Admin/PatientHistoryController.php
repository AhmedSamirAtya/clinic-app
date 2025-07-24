<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\PatientHistory;
use App\Http\Requests\PatientHistoryRequest;

/**
 * Class PatientHistoryController
 * @package App\Http\Controllers
 */
class PatientHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patientHistories = PatientHistory::paginate();

        return view('admin.patient-history.index', compact('patientHistories'))
            ->with('i', (request()->input('page', 1) - 1) * $patientHistories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $patientHistory = new PatientHistory();
        return view('admin.patient-history.create', compact('patientHistory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientHistoryRequest $request)
    {
        PatientHistory::create($request->validated());

        return redirect()->route('patient-histories.index')
            ->with('success', 'PatientHistory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patientHistory = PatientHistory::find($id);

        return view('admin.patient-history.show', compact('patientHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patientHistory = PatientHistory::find($id);

        return view('admin.patient-history.edit', compact('patientHistory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientHistoryRequest $request, PatientHistory $patientHistory)
    {
        $patientHistory->update($request->validated());

        return redirect()->route('patient-histories.index')
            ->with('success', 'PatientHistory updated successfully');
    }

    public function destroy($id)
    {
        PatientHistory::find($id)->delete();

        return redirect()->route('patient-histories.index')
            ->with('success', 'PatientHistory deleted successfully');
    }
}
