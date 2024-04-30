<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Medicine
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $unit
 * @property $concentration
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property MedicinePrescription[] $medicinePrescriptions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Medicine extends Model
{
    use SoftDeletes;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'unit', 'concentration'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medicinePrescriptions()
    {
        return $this->hasMany(\App\Models\MedicinePrescription::class, 'id', 'medicine_id');
    }
    

}
