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
 * Class Assistant
 *
 * @property $id
 * @property $name
 * @property $clinic_id
 * @property $address
 * @property $phone_number
 * @property $date_of_birth
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Clinic $clinic
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Assistant  extends Authenticatable implements MustVerifyEmail
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'clinic_id', 'address', 'phone_number', 'date_of_birth', 'email'];
    static $rules  = [
        'name' => 'required|string',
        'clinic_id' => 'required',
        'date_of_birth' => 'required|date',
        'phone_number' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
    ];

    static $messages =  [
        'name.required' => 'Please enter your name.',
        'clinic_id.required' => 'Please enter your clinic.',
        'date_of_birth.required' => 'Please provide your date of birth.',
        'date_of_birth.date' => 'Date of birth must be a valid date format.',
        'phone_number.required' => 'Please enter your phone number.',
        'email.required' => 'Please enter your email address.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email address is already registered.',
        'password.required' => 'Please enter a password.',
        'password.min' => 'Password must be at least 8 characters long.',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clinic()
    {
        return $this->belongsTo(\App\Models\Clinic::class, 'clinic_id', 'id');
    }
}
