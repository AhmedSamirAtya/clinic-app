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
 * @property $phone
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
class User extends Authenticatable implements MustVerifyEmail
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'phone', 'email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assistants()
    {
        return $this->hasMany(\App\Models\Assistant::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function doctors()
    {
        return $this->hasMany(\App\Models\Doctor::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nurses()
    {
        return $this->hasMany(\App\Models\Nurse::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patients()
    {
        return $this->hasMany(\App\Models\Patient::class, 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roleUsers()
    {
        return $this->hasMany(\App\Models\RoleUser::class, 'id', 'user_id');
    }
}
