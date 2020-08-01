<?php

namespace App;

use App\Scopes\SortScope;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
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
    protected $touches = ['question', 'test'];

    public function getPopularityAttribute()
    {
        return $this->loadCount('responses')->responses_count / $this->question->loadCount('responses')->responses_count;
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function test()
    {
        return $this->hasOneThrough(Test::class, Question::class);
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
