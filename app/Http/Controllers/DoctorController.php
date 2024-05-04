<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;

/**
 * Class DoctorController
 * @package App\Http\Controllers
 */
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::paginate();

        return view('doctor.index', compact('doctors'))
            ->with('i', (request()->input('page', 1) - 1) * $doctors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctor = new Doctor();
        return view('doctor.create', compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request)
    {
        Doctor::create($request->validated());

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);

        return view('doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);

        return view('doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->validated());

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor updated successfully');
    }

    public function destroy($id)
    {
        Doctor::find($id)->delete();

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor deleted successfully');
    }
}
