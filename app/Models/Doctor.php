<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Doctor
 *
 * @property $id
 * @property $user_id
 * @property $specialization
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property ClinicDoctor[] $clinicDoctors
 * @property Prescription[] $prescriptions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Doctor extends Model
{
    use SoftDeletes;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'specialization'];


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
    public function clinicDoctors()
    {
        return $this->hasMany(\App\Models\ClinicDoctor::class, 'id', 'doctor_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prescriptions()
    {
        return $this->hasMany(\App\Models\Prescription::class, 'id', 'doctor_id');
    }
    

}
