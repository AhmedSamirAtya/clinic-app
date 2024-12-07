<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Http\Requests\MedicineRequest;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::paginate();
        return view('admin.medicine.index', compact('medicines'))
            ->with('i', (request()->input('page', 1) - 1) * $medicines->perPage());
    }

    public function create()
    {
        $medicine = new Medicine();
        return view('admin.medicine.create', compact('medicine'));
    }

    public function store(MedicineRequest $request)
    {
        Medicine::create($request->validated());
        return redirect()->route('medicines.index')
            ->with('success', 'Medicine created successfully.');
    }

    public function show($id)
    {
        $medicine = Medicine::find($id);
        return view('admin.medicine.show', compact('medicine'));
    }

    public function edit($id)
    {
        $medicine = Medicine::find($id);
        return view('admin.medicine.edit', compact('medicine'));
    }

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
