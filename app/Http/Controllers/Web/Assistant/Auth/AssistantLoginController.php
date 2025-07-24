<?php

namespace App\Http\Controllers\Web\Assistant\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assistant\Auth\AssistantLoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AssistantLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('assistant.auth.login');
    }

    protected $redirectTo = '/assistant/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function permitLogin(AssistantLoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::guard('assistant')->attempt($credentials)) {
            //$user = Auth::guard('assistant')->user();
            return redirect($this->redirectTo);
        } else {
            return Redirect::back()->withErrors(['errors' => 'Invalid credentials']);
        }
    }
}
