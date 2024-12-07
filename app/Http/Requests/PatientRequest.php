<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
			'name' => 'required|string',
			'job' => 'string',
			'address' => 'string',
			'phone_number' => 'required|string',
			'date_of_birth' => 'required',
			'email' => 'required|string',
            'password' => 'required|string'
        ];
    }
}
