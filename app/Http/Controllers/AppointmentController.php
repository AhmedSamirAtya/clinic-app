<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\AppointmentRequest;

/**
 * Class AppointmentController
 * @package App\Http\Controllers
 */
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::paginate();

        return view('appointment.index', compact('appointments'))
            ->with('i', (request()->input('page', 1) - 1) * $appointments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $appointment = new Appointment();
        return view('appointment.create', compact('appointment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppointmentRequest $request)
    {
        Appointment::create($request->validated());

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $appointment = Appointment::find($id);

        return view('appointment.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $appointment = Appointment::find($id);

        return view('appointment.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->validated());

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment updated successfully');
    }

    public function destroy($id)
    {
        Appointment::find($id)->delete();

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment deleted successfully');
    }
}
