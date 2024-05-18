<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MedicinePrescription
 *
 * @property $id
 * @property $medicine_id
 * @property $prescription_id
 * @property $dose
 * @property $duration_in_days
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Medicine $medicine
 * @property Prescription $prescription
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MedicinePrescription extends Model
{
    use SoftDeletes;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['medicine_id', 'prescription_id', 'dose', 'duration_in_days'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medicine()
    {
        return $this->belongsTo(\App\Models\Medicine::class);
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prescription()
    {
        return $this->belongsTo(\App\Models\Prescription::class);
    }
    

}
