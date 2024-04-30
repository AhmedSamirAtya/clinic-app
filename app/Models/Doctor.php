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
 * @property $date_of_birth
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @property ClinicUser[] $clinicDoctors
 * @property Prescription[] $prescriptions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Doctor extends Model
{
    use SoftDeletes;
    protected $perPage = 20;
    protected $fillable = ['user_id', 'specialization', 'date_of_birth'];
    static $rules = [
        'user_id' => 'required',
        'specialization' => 'required|string',
        'date_of_birth' => 'required',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function clinicUsers()
    {
        return $this->hasMany(\App\Models\ClinicUser::class, 'id', 'doctor_id');
    }

    public function prescriptions()
    {
        return $this->hasMany(\App\Models\Prescription::class, 'id', 'doctor_id');
    }
}
