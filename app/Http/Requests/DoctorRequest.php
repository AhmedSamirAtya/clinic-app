<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'user_id' => 'required',
			'specialization' => 'required|string',
            'date_of_birth' => 'required',
        ];
    }

    public function messages()
    {   
        return [
            'user_id.required' => 'user id is required',
            'specialization.required' => 'specialization is required',
            'date_of_birth.required' => 'date_of_birth factor Id is required',
        ];
    }
}
