<?php

namespace App\Http\Requests\Doctor\Auth;

use Illuminate\Foundation\Http\FormRequest;

class DoctorLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'email is required',
            'email.email' => 'email field should be in email format',
            'password.required' => 'password is required',
            'password.min:8' => 'password is minimum 8 characters',
        ];
    }
}
