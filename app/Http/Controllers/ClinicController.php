<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Http\Requests\ClinicRequest;

/**
 * Class ClinicController
 * @package App\Http\Controllers
 */
class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clinics = Clinic::paginate();

        return view('clinic.index', compact('clinics'))
            ->with('i', (request()->input('page', 1) - 1) * $clinics->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clinic = new Clinic();
        return view('clinic.create', compact('clinic'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClinicRequest $request)
    {
        Clinic::create($request->validated());

        return redirect()->route('clinics.index')
            ->with('success', 'Clinic created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clinic = Clinic::find($id);

        return view('clinic.show', compact('clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clinic = Clinic::find($id);

        return view('clinic.edit', compact('clinic'));
    }

    /**
     * Update the specified resource in storage.
     */
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
