<?php

namespace App;

use App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function students()
    {
        return $this->hasManyThrough(User::class, Result::class);
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

    public function getResultAttribute()
    {
        if (! user()) {
            return;
        }

        return $this->results()->whereUserId(user()->id)->first();
    }
}
