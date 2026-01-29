<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Http\Requests\Doctor\DoctorRequest;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('specializations')->paginate();
        return view('admin.doctor.index', compact('doctors'))
            ->with('i', (request()->input('page', 1) - 1) * $doctors->perPage());
    }

    public function create()
    {
        $doctor = new Doctor();
        return view('admin.doctor.create', compact('doctor'));
    }

    public function store(DoctorRequest $request)
    {
        Doctor::create($request->validated());
        return redirect()->route('doctors.index')
            ->with('success', 'Doctor created successfully.');
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.doctor.show', compact('doctor'));
    }

    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('admin.doctor.edit', compact('doctor'));
    }

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
