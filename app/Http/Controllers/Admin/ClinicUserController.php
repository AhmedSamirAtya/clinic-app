<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClinicUser;
use App\Http\Requests\ClinicUserRequest;

/**
 * Class ClinicUserController
 * @package App\Http\Controllers
 */
class ClinicUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clinicUsers = ClinicUser::paginate();

        return view('clinic-user.index', compact('clinicUsers'))
            ->with('i', (request()->input('page', 1) - 1) * $clinicUsers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clinicUser = new ClinicUser();
        return view('clinic-user.create', compact('clinicUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClinicUserRequest $request)
    {
        ClinicUser::create($request->validated());

        return redirect()->route('clinic-users.index')
            ->with('success', 'ClinicUser created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $clinicUser = ClinicUser::find($id);

        return view('clinic-user.show', compact('clinicUser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $clinicUser = ClinicUser::find($id);

        return view('clinic-user.edit', compact('clinicUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClinicUserRequest $request, ClinicUser $clinicUser)
    {
        $clinicUser->update($request->validated());

        return redirect()->route('clinic-users.index')
            ->with('success', 'ClinicUser updated successfully');
    }

    public function destroy($id)
    {
        ClinicUser::find($id)->delete();

        return redirect()->route('clinic-users.index')
            ->with('success', 'ClinicUser deleted successfully');
    }
}
