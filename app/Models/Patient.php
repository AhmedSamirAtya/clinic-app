<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Patient
 *
 * @property $id
 * @property $name
 * @property $job
 * @property $address
 * @property $age_in_month
 * @property $phone_number
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Appointment[] $appointments
 * @property PatientHistory[] $patientHistories
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Patient extends Model
{
    use SoftDeletes;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'job', 'address', 'age_in_month', 'phone_number'];


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
