<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Doctor
 *
 * @property $id
 * @property $name
 * @property $specialization
 * @property $date_of_birth
 * @property $phone_number
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Appointment[] $appointments
 * @property ClinicDoctor[] $clinicDoctors
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Doctor extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;
    protected $table = 'doctors';

    protected $perPage = 20;

    protected $fillable = ['name', 'specialization', 'date_of_birth', 'phone_number', 'email', 'password'];
    protected $hidden = ['password'];
    static $rules  = [
        'name' => 'required|string',
        'specialization' => 'required|string',
        'date_of_birth' => 'required|date',
        'phone_number' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ];

    static $messages =  [
        'name.required' => 'Please enter your name.',
        'specialization.required' => 'Please specify your specialization.',
        'date_of_birth.required' => 'Please provide your date of birth.',
        'date_of_birth.date' => 'Date of birth must be a valid date format.',
        'phone_number.required' => 'Please enter your phone number.',
        'email.required' => 'Please enter your email address.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email address is already registered.',
        'password.required' => 'Please enter a password.',
        'password.min' => 'Password must be at least 8 characters long.',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function clinicDoctors()
    {
        return $this->hasMany(ClinicDoctor::class);
    }
}
