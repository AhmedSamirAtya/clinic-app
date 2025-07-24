<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use App\Http\Requests\PrescriptionRequest;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::paginate();

        return view('admin.prescription.index', compact('prescriptions'))
            ->with('i', (request()->input('page', 1) - 1) * $prescriptions->perPage());
    }

    public function create()
    {
        $prescription = new Prescription();
        return view('admin.prescription.create', compact('prescription'));
    }

    public function store(PrescriptionRequest $request)
    {
        $prescription =  Prescription::create($request->validated());
        $prescription->medicines()->sync($request->medicines);
        return redirect()->route('prescriptions.index')
            ->with('success', 'Prescription created successfully.');
    }

    public function show($id)
    {
        $prescription = Prescription::find($id);
        return view('admin.prescription.show', compact('prescription'));
    }

    public function edit($id)
    {
        $prescription = Prescription::find($id);
        return view('admin.prescription.edit', compact('prescription'));
    }

    public function update(PrescriptionRequest $request, Prescription $prescription)
    {
        $prescription->update($request->validated());
        $prescription->medicines()->sync($request->medicines);
        return redirect()->route('prescriptions.index')
            ->with('success', 'Prescription updated successfully');
    }

    public function destroy($id)
    {
        $prescription = Prescription::find($id);
        $prescription->medicines()->detach();
        $prescription->delete();

        return redirect()->route('prescriptions.index')
            ->with('success', 'Prescription deleted successfully');
    }
}
