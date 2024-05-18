<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Appointment
 *
 * @property $id
 * @property $patient_id
 * @property $doctor_id
 * @property $clinic_id
 * @property $appointment_datetime
 * @property $type
 * @property $reson
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Doctor $doctor
 * @property Patient $patient
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Appointment extends Model
{
    use SoftDeletes;
    protected $table = 'appointments';

    protected $perPage = 20;

    protected $fillable = ['patient_id', 'doctor_id', 'clinic_id', 'appointment_datetime', 'type', 'reason'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
