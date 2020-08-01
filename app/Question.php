<?php

namespace App;

use App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['test'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function responses()
    {
        return $this->hasManyThrough(Response::class, Answer::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
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
