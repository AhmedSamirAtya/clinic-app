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
 * @property $start_time
 * @property $end_time
 * @property $working_days
 * @property $appointment_price
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
    protected $table = 'clinic_doctor';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clinic_id', 'doctor_id', 'start_time', 'end_time', 'working_days', 'appointment_price'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clinic()
    {
        return $this->belongsTo(\App\Models\Clinic::class, 'clinic_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(\App\Models\Doctor::class, 'doctor_id', 'id');
    }


}
