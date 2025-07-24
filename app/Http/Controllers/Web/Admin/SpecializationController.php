<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specialization\SpecializationRequest;
use App\Models\Specialization;

/**
 * Class SpecializationController
 * @package App\Http\Controllers
 */
class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specializations = Specialization::paginate();

        return view('specialization.index', compact('specializations'))
            ->with('i', (request()->input('page', 1) - 1) * $specializations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialization = new Specialization();
        return view('specialization.create', compact('specialization'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecializationRequest $request)
    {
        Specialization::create($request->validated());

        return redirect()->route('specializations.index')
            ->with('success', 'Specialization created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $specialization = Specialization::find($id);

        return view('specialization.show', compact('specialization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $specialization = Specialization::find($id);

        return view('specialization.edit', compact('specialization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecializationRequest $request, Specialization $specialization)
    {
        $specialization->update($request->validated());

        return redirect()->route('specializations.index')
            ->with('success', 'Specialization updated successfully');
    }

    public function destroy($id)
    {
        Specialization::find($id)->delete();

        return redirect()->route('specializations.index')
            ->with('success', 'Specialization deleted successfully');
    }
}
