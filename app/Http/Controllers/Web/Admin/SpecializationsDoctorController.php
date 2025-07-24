<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\SpecializationsDoctor;
use App\Http\Requests\SpecializationsDoctorRequest;

/**
 * Class SpecializationsDoctorController
 * @package App\Http\Controllers
 */
class SpecializationsDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specializationsDoctors = SpecializationsDoctor::paginate();

        return view('specializations-doctor.index', compact('specializationsDoctors'))
            ->with('i', (request()->input('page', 1) - 1) * $specializationsDoctors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializationsDoctor = new SpecializationsDoctor();
        return view('specializations-doctor.create', compact('specializationsDoctor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecializationsDoctorRequest $request)
    {
        SpecializationsDoctor::create($request->validated());

        return redirect()->route('specializations-doctors.index')
            ->with('success', 'SpecializationsDoctor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $specializationsDoctor = SpecializationsDoctor::find($id);

        return view('specializations-doctor.show', compact('specializationsDoctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $specializationsDoctor = SpecializationsDoctor::find($id);

        return view('specializations-doctor.edit', compact('specializationsDoctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecializationsDoctorRequest $request, SpecializationsDoctor $specializationsDoctor)
    {
        $specializationsDoctor->update($request->validated());

        return redirect()->route('specializations-doctors.index')
            ->with('success', 'SpecializationsDoctor updated successfully');
    }

    public function destroy($id)
    {
        SpecializationsDoctor::find($id)->delete();

        return redirect()->route('specializations-doctors.index')
            ->with('success', 'SpecializationsDoctor deleted successfully');
    }
}
