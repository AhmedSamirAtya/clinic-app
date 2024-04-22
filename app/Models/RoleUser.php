<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RoleUser
 *
 * @property $id
 * @property $user_id
 * @property $role_id
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Role $role
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RoleUser extends Model
{
    use SoftDeletes;


    protected $perPage = 20;
    protected $table = 'role_user';
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'role_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class, 'role_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    

}
