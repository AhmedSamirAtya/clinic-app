<?php

namespace App\Http\Controllers;

use App\Models\ClinicDoctor;
use App\Http\Requests\ClinicDoctorRequest;

/**
 * Class ClinicDoctorController
 * @package App\Http\Controllers
 */
class ClinicDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clinicDoctors = ClinicDoctor::paginate();

        return view('clinic-doctor.index', compact('clinicDoctors'))
            ->with('i', (request()->input('page', 1) - 1) * $clinicDoctors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clinicDoctor = new ClinicDoctor();
        return view('clinic-doctor.create', compact('clinicDoctor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClinicDoctorRequest $request)
    {
        ClinicDoctor::create($request->validated());

        return redirect()->route('clinic-doctors.index')
            ->with('success', 'ClinicDoctor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clinicDoctor = ClinicDoctor::find($id);

        return view('clinic-doctor.show', compact('clinicDoctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clinicDoctor = ClinicDoctor::find($id);

        return view('clinic-doctor.edit', compact('clinicDoctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClinicDoctorRequest $request, ClinicDoctor $clinicDoctor)
    {
        $clinicDoctor->update($request->validated());

        return redirect()->route('clinic-doctors.index')
            ->with('success', 'ClinicDoctor updated successfully');
    }

    public function destroy($id)
    {
        ClinicDoctor::find($id)->delete();

        return redirect()->route('clinic-doctors.index')
            ->with('success', 'ClinicDoctor deleted successfully');
    }
}
