<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ideology extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function requirements()
    {
        return $this->hasMany(IdeologyRequirement::class);
    }
}
