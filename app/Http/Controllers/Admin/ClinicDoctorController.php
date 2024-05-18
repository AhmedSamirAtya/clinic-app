<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicDoctor;
use App\Http\Requests\ClinicDoctorRequest;

/**
 * Class ClinicDoctorController
 * @package App\Http\Controllers
 */
class ClinicDoctorController extends Controller
{
    
    public function index()
    {
        $clinicDoctors = ClinicDoctor::paginate();

        return view('admin.clinic-doctor.index', compact('clinicDoctors'))
            ->with('i', (request()->input('page', 1) - 1) * $clinicDoctors->perPage());
    }

    
    public function create()
    {
        $clinicDoctor = new ClinicDoctor();
        return view('admin.clinic-doctor.create', compact('clinicDoctor'));
    }

   
    public function store(ClinicDoctorRequest $request)
    {
        ClinicDoctor::create($request->validated());

        return redirect()->route('clinic-doctors.index')
            ->with('success', 'ClinicDoctor created successfully.');
    }

    
    public function show($id)
    {
        $clinicDoctor = ClinicDoctor::find($id);

        return view('admin.clinic-doctor.show', compact('clinicDoctor'));
    }

   
    public function edit($id)
    {
        $clinicDoctor = ClinicDoctor::find($id);

        return view('admin.clinic-doctor.edit', compact('clinicDoctor'));
    }

    
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
