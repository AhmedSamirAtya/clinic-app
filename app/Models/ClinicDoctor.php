<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ClinicDoctor
 *
 * @property $id
 * @property $clinic_id
 * @property $doctor_id
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Clinic $clinic
 * @property Doctor $doctor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ClinicDoctor extends Model
{
    use SoftDeletes;

    protected $perPage = 20;
    protected $table = "clinic_doctor";
 
    protected $fillable = ['clinic_id', 'doctor_id'];

    public function clinic()
    {
        return $this->belongsTo(\App\Models\Clinic::class, 'clinic_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(\App\Models\Doctor::class, 'doctor_id', 'id');
    }
}
