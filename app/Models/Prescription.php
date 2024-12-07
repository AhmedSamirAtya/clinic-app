<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prescription
 *
 * @property $id
 * @property $appointment_id
 * @property $diagnosis
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Appointment $appointment
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Prescription extends Model
{
    use SoftDeletes;
    protected $perPage = 20;
    protected $fillable = ['appointment_id', 'diagnosis'];

    public function appointment()
    {
        return $this->belongsTo(\App\Models\Appointment::class);
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class)->withTimestamps();
    }
}
