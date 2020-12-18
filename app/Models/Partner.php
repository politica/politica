<?php

namespace App\Models;

use App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new SortScope());
    }
}
