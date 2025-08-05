<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * Class Appointment
 *
 * @property $id
 * @property $patient_id
 * @property $doctor_id
 * @property $clinic_id
 * @property $date
 * @property $order
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

    protected $fillable = ['patient_id', 'doctor_id', 'clinic_id', 'date', 'type', 'reason', 'order'];

     protected $casts = [
        'date' => 'date', // Optional: if you want to work with Carbon instances
    ];

    protected static function boot()
{
    parent::boot();

    static::creating(function ($appointment) {
        if (!$appointment->clinic_id || !$appointment->doctor_id || !$appointment->date) {
            return;
        }
        $lastOrder = static::where('clinic_id', $appointment->clinic_id)
            ->where('doctor_id', $appointment->doctor_id)
            ->whereDate('date', $appointment->date?->format('Y-m-d'))
            ->max('order');
        $appointment->order = $lastOrder + 1;
    });
}

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function prescription()
    {
        return $this->hasOne(Prescription::class, 'appointment_id');
    }
}
