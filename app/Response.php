<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function question()
    {
        return $this->hasOneThrough(Question::class, Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
