<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\UserRequest;
use App\Models\ClinicUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class DoctorController
 * @package App\Http\Controllers
 */
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::paginate();

        return view('doctor.index', compact('doctors'))
            ->with('i', (request()->input('page', 1) - 1) * $doctors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctor = new Doctor();
        return view('doctor.create', compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $hasPassword = Hash::make($request->password);
        $request->merge([
            'password' => $hasPassword,
            'role_id' => 3,

        ]);
        $user = User::create($request->all());
        Doctor::create([
            'user_id' => $user->id,
            'specialization' => $request->specialization,
            'date_of_birth' => $request->date_of_birth
        ]);

        ClinicUser::create([
            'user_id' => $user->id,
            'clinic_id' => $request->clinic_id
        ]);

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor created successfully.');
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);

        return view('doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);

        return view('doctor.edit', compact('doctor'));
    }

    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $user = User::find($request->user_id);
        $user->update($request->all());
        $doctor->update($request->all());

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor updated successfully');
    }

    public function destroy($id)
    {
        Doctor::find($id)->delete();

        return redirect()->route('doctors.index')
            ->with('success', 'Doctor deleted successfully');
    }
}
