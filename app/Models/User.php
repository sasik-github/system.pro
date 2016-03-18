<?php

namespace App\Models;

use App\Models\ParentModel;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    const ADMIN = 1;

    const PARENT = 2;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telephone',
        'role_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function parent()
    {
        return $this->hasOne(ParentModel::class);
    }

    /**
     * password auto hashing mutator
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role_id == self::ADMIN;
    }

    public function isParent()
    {
        return $this->parent ? true : false;
    }
}
