<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Patient
 *
 * @property $id
 * @property $user_id
 * @property $address
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property PatientHistory[] $patientHistories
 * @property Prescription[] $prescriptions
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
    protected $fillable = ['user_id', 'address'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patientHistories()
    {
        return $this->hasMany(\App\Models\PatientHistory::class, 'id', 'patient_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prescriptions()
    {
        return $this->hasMany(\App\Models\Prescription::class, 'id', 'patient_id');
    }
    

}
