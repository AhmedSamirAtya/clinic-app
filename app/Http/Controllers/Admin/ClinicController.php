<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Http\Requests\ClinicRequest;

/**
 * Class ClinicController
 * @package App\Http\Controllers
 */
class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::with('appointments')->paginate();
        return view('admin.clinic.index', compact('clinics'))
            ->with('i', (request()->input('page', 1) - 1) * $clinics->perPage());
    }

    public function create()
    {
        $clinic = new Clinic();
        return view('admin.clinic.create', compact('clinic'));
    }

    public function store(ClinicRequest $request)
    {
        Clinic::create($request->validated());

        return redirect()->route('clinics.index')
            ->with('success', 'Clinic created successfully.');
    }

    public function show($id)
    {
        $clinic = Clinic::with('assistants')->find($id);
        dd($clinic);
        return view('admin.clinic.show', compact('clinic'));
    }

    public function edit($id)
    {
        $clinic = Clinic::find($id);

        return view('admin.clinic.edit', compact('clinic'));
    }

    public function update(ClinicRequest $request, Clinic $clinic)
    {
        $clinic->update($request->validated());

        return redirect()->route('clinics.index')
            ->with('success', 'Clinic updated successfully');
    }

    public function destroy($id)
    {
        Clinic::find($id)->delete();

        return redirect()->route('clinics.index')
            ->with('success', 'Clinic deleted successfully');
    }
}
