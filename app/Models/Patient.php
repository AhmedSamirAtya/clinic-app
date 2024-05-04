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
 * Class Patient
 *
 * @property $id
 * @property $name
 * @property $job
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
 * @property Appointment[] $appointments
 * @property PatientHistory[] $patientHistories
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Patient extends Authenticatable implements MustVerifyEmail
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'job', 'address', 'phone_number', 'date_of_birth', 'email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class, 'id', 'patient_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patientHistories()
    {
        return $this->hasMany(\App\Models\PatientHistory::class, 'id', 'patient_id');
    }
    

}
