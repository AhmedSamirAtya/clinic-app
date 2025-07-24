<?php

namespace App\Http\Controllers\Web\Patient\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\Auth\PatientRegisterationRequest;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PatientRegisterController extends Controller
{
    protected $redirectTo = '/patient/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegisterationForm()
    {
        return view('patient.auth.register');
    }

    public function register(PatientRegisterationRequest $request)
    {
        $patient = Patient::create([
            'name' => $request->name,
            'job' => $request->job,
            'address' => $request->address,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::guard('patient')->attempt($credentials)) {
            //$user = Auth::guard('patient')->user();
            return redirect($this->redirectTo);
        } else {
            return Redirect::back()->withErrors(['errors' => 'Invalid credentials']);
        }
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'specialization' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:patients'],
    //         'date_of_birth' => ['required', 'string', 'email', 'max:255', 'unique:patients'],
    //         'phone' => ['required', 'regex:/(01)[0-9]{9}/'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    // protected function create(array $data)
    // {
    //     return Patient::create([
    //         'name' => $data['name'],
    //         'specialization' => $data['specialization'],
    //         'date_of_birth' => $data['date_of_birth'],
    //         'email' => $data['email'],
    //         'phone_number' => $data['phone_number'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }


}
