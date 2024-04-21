<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prescription
 *
 * @property $id
 * @property $patient_id
 * @property $doctor_id
 * @property $diagnosis
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Doctor $doctor
 * @property Patient $patient
 * @property MedicinePrescription[] $medicinePrescriptions
 * @property PatientHistory[] $patientHistories
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Prescription extends Model
{
    use SoftDeletes;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['patient_id', 'doctor_id', 'diagnosis'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(\App\Models\Doctor::class, 'doctor_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class, 'patient_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicinePrescriptions()
    {
        return $this->hasMany(\App\Models\MedicinePrescription::class, 'id', 'prescription_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patientHistories()
    {
        return $this->hasMany(\App\Models\PatientHistory::class, 'id', 'prescription_id');
    }
    

}
