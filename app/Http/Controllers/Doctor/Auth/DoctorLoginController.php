<?php

namespace App\Http\Controllers\Doctor\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\Auth\DoctorLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DoctorLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('doctor.auth.login');
    }

    protected $redirectTo = '/doctor/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function permitLogin(DoctorLoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::guard('doctor')->attempt($credentials)) {
            //$user = Auth::guard('doctor')->user();
            return redirect($this->redirectTo);
        } else {
            return Redirect::back()->withErrors(['errors' => 'Invalid credentials']);
        }
    }
}
