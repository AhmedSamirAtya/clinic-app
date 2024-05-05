<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Http\Requests\MedicineRequest;

/**
 * Class MedicineController
 * @package App\Http\Controllers
 */
class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicines = Medicine::paginate();

        return view('medicine.index', compact('medicines'))
            ->with('i', (request()->input('page', 1) - 1) * $medicines->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicine = new Medicine();
        return view('medicine.create', compact('medicine'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicineRequest $request)
    {
        Medicine::create($request->validated());

        return redirect()->route('medicines.index')
            ->with('success', 'Medicine created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);

        return view('medicine.show', compact('medicine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicine = Medicine::find($id);

        return view('medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicineRequest $request, Medicine $medicine)
    {
        $medicine->update($request->validated());

        return redirect()->route('medicines.index')
            ->with('success', 'Medicine updated successfully');
    }

    public function destroy($id)
    {
        Medicine::find($id)->delete();

        return redirect()->route('medicines.index')
            ->with('success', 'Medicine deleted successfully');
    }
}
