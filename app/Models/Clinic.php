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
 * @property Appointment[] $appointments
 * @property Assistant[] $assistants
 * @property ClinicDoctor[] $clinicDoctors
 * @property Location[] $locations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Clinic extends Model
{
    use SoftDeletes;

    protected $perPage = 20;
    protected $table = 'clinics';

    protected $fillable = ['name'];
    static $rules  = [
        'name' => 'required|string',
    ];

    static $messages =  [
        'name.required' => 'Please enter your name.',
    ];

    public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class);
    }

    public function assistants()
    {
        return $this->hasMany(\App\Models\Assistant::class);
    }

    public function clinicDoctors()
    {
        return $this->hasMany(\App\Models\ClinicDoctor::class);
    }

    public function locations()
    {
        return $this->hasMany(\App\Models\Location::class);
    }
}
