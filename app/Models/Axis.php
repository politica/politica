<?php

namespace App\Models;

use App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Model;

class Axis extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function ideologyRequirements()
    {
        return $this->hasMany(IdeologyRequirement::class);
    }

    public function regions()
    {
        return $this->hasMany(AxisRegion::class);
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
