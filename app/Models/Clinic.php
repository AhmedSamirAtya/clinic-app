<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Clinic
 *
 * @property $id
 * @property $name
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property ClinicDoctor[] $clinicDoctors
 * @property Location[] $locations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Clinic extends Model
{
    use SoftDeletes;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clinicDoctors()
    {
        return $this->hasMany(\App\Models\ClinicDoctor::class, 'id', 'clinic_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations()
    {
        return $this->hasMany(\App\Models\Location::class, 'id', 'clinic_id');
    }
    

}
