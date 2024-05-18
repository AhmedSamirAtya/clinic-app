<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PatientHistory
 *
 * @property $id
 * @property $patient_id
 * @property $prescription_id
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Patient $patient
 * @property Prescription $prescription
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PatientHistory extends Model
{
    use SoftDeletes;


    protected $perPage = 20;
    protected $table = 'patient_history';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['patient_id', 'prescription_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prescription()
    {
        return $this->belongsTo(\App\Models\Prescription::class);
    }
    

}
