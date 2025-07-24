<?php

namespace App\Http\Controllers\Web\Assistant\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Assistant\Auth\AssistantRegisterationRequest;
use App\Models\Assistant;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AssistantRegisterController extends Controller
{
    protected $redirectTo = '/assistant/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegisterationForm()
    {
        return view('assistant.auth.register');
    }

    public function register(AssistantRegisterationRequest $request)
    {
        $assistant = Assistant::create([
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
        if (Auth::guard('assistant')->attempt($credentials)) {
            //$user = Auth::guard('assistant')->user();
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
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:assistants'],
    //         'date_of_birth' => ['required', 'string', 'email', 'max:255', 'unique:assistants'],
    //         'phone' => ['required', 'regex:/(01)[0-9]{9}/'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    // protected function create(array $data)
    // {
    //     return Assistant::create([
    //         'name' => $data['name'],
    //         'specialization' => $data['specialization'],
    //         'date_of_birth' => $data['date_of_birth'],
    //         'email' => $data['email'],
    //         'phone_number' => $data['phone_number'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }


}
