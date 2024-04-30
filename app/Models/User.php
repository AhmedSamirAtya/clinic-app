<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $phone_number
 * @property $role_id
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Assistant[] $assistants
 * @property Doctor[] $doctors
 * @property Nurse[] $nurses
 * @property Patient[] $patients
 * @property RoleUser[] $roleUsers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'phone_number', 'email', 'role_id', 'password'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assistants()
    {
        return $this->hasMany(\App\Models\Assistant::class, 'id', 'user_id');
    }

    public function doctors()
    {
        return $this->hasMany(\App\Models\Doctor::class, 'id', 'user_id');
    }
    public function nurses()
    {
        return $this->hasMany(\App\Models\Nurse::class, 'id', 'user_id');
    }

    public function role()
    {
        return $this->hasOne(\App\Models\Role::class, 'id', 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany(\App\Models\Patient::class, 'id', 'user_id');
    }
}
