<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MedicinePrescription;
use App\Http\Requests\MedicinePrescriptionRequest;

/**
 * Class MedicinePrescriptionController
 * @package App\Http\Controllers
 */
class MedicinePrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicinePrescriptions = MedicinePrescription::paginate();

        return view('medicine-prescription.index', compact('medicinePrescriptions'))
            ->with('i', (request()->input('page', 1) - 1) * $medicinePrescriptions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicinePrescription = new MedicinePrescription();
        return view('medicine-prescription.create', compact('medicinePrescription'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicinePrescriptionRequest $request)
    {
        MedicinePrescription::create($request->validated());

        return redirect()->route('medicine-prescriptions.index')
            ->with('success', 'MedicinePrescription created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicinePrescription = MedicinePrescription::find($id);

        return view('medicine-prescription.show', compact('medicinePrescription'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicinePrescription = MedicinePrescription::find($id);

        return view('medicine-prescription.edit', compact('medicinePrescription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicinePrescriptionRequest $request, MedicinePrescription $medicinePrescription)
    {
        $medicinePrescription->update($request->validated());

        return redirect()->route('medicine-prescriptions.index')
            ->with('success', 'MedicinePrescription updated successfully');
    }

    public function destroy($id)
    {
        MedicinePrescription::find($id)->delete();

        return redirect()->route('medicine-prescriptions.index')
            ->with('success', 'MedicinePrescription deleted successfully');
    }
}
