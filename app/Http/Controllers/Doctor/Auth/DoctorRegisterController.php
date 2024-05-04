<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\Auth\DoctorRegisterationRequest;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorRegisterController extends Controller
{
    protected $redirectTo = '/doctor/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegisterationForm()
    {
        return view('doctor.auth.register');
    }

    public function register(DoctorRegisterationRequest $request)
    {
        Doctor::create([
            'name' => $request->name,
            'specialization' => $request->specialization,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect($this->redirectTo);
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'specialization' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:doctors'],
    //         'date_of_birth' => ['required', 'string', 'email', 'max:255', 'unique:doctors'],
    //         'phone' => ['required', 'regex:/(01)[0-9]{9}/'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    // protected function create(array $data)
    // {
    //     return Doctor::create([
    //         'name' => $data['name'],
    //         'specialization' => $data['specialization'],
    //         'date_of_birth' => $data['date_of_birth'],
    //         'email' => $data['email'],
    //         'phone_number' => $data['phone_number'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }


}
