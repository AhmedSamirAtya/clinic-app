<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Location
 *
 * @property $id
 * @property $clinic_id
 * @property $address
 * @property $city
 * @property $state
 * @property $postal_code
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Clinic $clinic
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Location extends Model
{
    use SoftDeletes;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['clinic_id', 'address', 'city', 'state', 'postal_code'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clinic()
    {
        return $this->belongsTo(\App\Models\Clinic::class, 'clinic_id', 'id');
    }
    

}
