<?php

namespace App\Http\Requests\Doctor;

use App\Models\Doctor;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return Doctor::$rules;
    }
    public function messages(): array
    {
        return Doctor::$messages;
    }
}
