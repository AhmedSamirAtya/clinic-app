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
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property ClinicUser[] $clinicUsers
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
    protected $fillable = ['name', 'phone_number', 'email'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clinicUsers()
    {
        return $this->hasMany(\App\Models\ClinicUser::class, 'id', 'user_id');
    }
}