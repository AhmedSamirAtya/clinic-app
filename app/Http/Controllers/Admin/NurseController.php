<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nurse;
use App\Http\Requests\NurseRequest;

/**
 * Class NurseController
 * @package App\Http\Controllers
 */
class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nurses = Nurse::paginate();

        return view('nurse.index', compact('nurses'))
            ->with('i', (request()->input('page', 1) - 1) * $nurses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nurse = new Nurse();
        return view('nurse.create', compact('nurse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NurseRequest $request)
    {
        Nurse::create($request->validated());

        return redirect()->route('nurses.index')
            ->with('success', 'Nurse created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $nurse = Nurse::find($id);

        return view('nurse.show', compact('nurse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $nurse = Nurse::find($id);

        return view('nurse.edit', compact('nurse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NurseRequest $request, Nurse $nurse)
    {
        $nurse->update($request->validated());

        return redirect()->route('nurses.index')
            ->with('success', 'Nurse updated successfully');
    }

    public function destroy($id)
    {
        Nurse::find($id)->delete();

        return redirect()->route('nurses.index')
            ->with('success', 'Nurse deleted successfully');
    }
}
