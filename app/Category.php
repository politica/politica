<?php

namespace App;

use App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

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
