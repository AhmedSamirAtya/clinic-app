<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Specialization
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property SpecializationsDoctor[] $specializationsDoctors
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Specialization extends Model
{


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function specializationsDoctors()
    // {
    //     return $this->hasMany(\App\Models\SpecializationsDoctor::class, 'id', 'specialization_id');
    // }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'specializations_doctors', 'specialization_id', 'doctor_id');
    }


}
