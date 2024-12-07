<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 *
 * @property $id
 * @property $name
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property RoleUser[] $roleUsers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Role extends Model
{
    use SoftDeletes;
    protected $perPage = 20;

    protected $fillable = ['name'];
}
