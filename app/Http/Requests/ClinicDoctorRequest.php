<?php

namespace App\Http\Requests;

use App\Constants\DaysOfWeek;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClinicDoctorRequest extends FormRequest
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
			'clinic_id' => 'required',
			'doctor_id' => 'required',
            'start_time' => 'required',
			'end_time' => 'required',
            'working_days' => 'nullable|array', // The main input should be an array
            'working_days.*' => ['string', Rule::in(DaysOfWeek::ALL_DAYS)], // Each item in the array must be a string and one of your defined days
            'appointment_price' => 'required',
        ];
    }
}
