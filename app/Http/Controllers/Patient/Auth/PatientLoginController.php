<?php

namespace App\Http\Controllers\Patient\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\Auth\PatientLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PatientLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('patient.auth.login');
    }

    protected $redirectTo = '/patient/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function permitLogin(PatientLoginRequest $request)
    {
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
}
