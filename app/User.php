<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function getAvatarAttribute($value)
    {
        if (! $value) {
            return '/images/user.png';
        }

        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            return '/storage/'.$value;
        }

        return $value;
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function tests()
    {
        return $this->hasManyThrough(Test::class, Result::class);
    }
}
