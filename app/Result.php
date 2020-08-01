<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
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
    protected $touches = ['user'];

    public function setValueAttribute()
    {
        $responses = Response::whereUserId(user()->id)->whereHas('answer.question', function ($query) {
            $query->whereTestId($this->test->id);
        })->get();

        $leftMax = $responses->sum(function (Response $response) {
            return $response->answer->question->answers()->whereDirection('left')->orderByDesc('magnitude')->first()->magnitude ?? 0;
        });
        $rightMax = $responses->sum(function (Response $response) {
            return $response->answer->question->answers()->whereDirection('right')->orderByDesc('magnitude')->first()->magnitude ?? 0;
        });

        if (! $leftMax || ! $rightMax) {
            return 50;
        }

        $leftResponded = $responses->filter(function (Response $response) {
            return $response->answer->direction == 'left';
        })->sum(function (Response $response) {
            return $response->answer->magnitude;
        });
        $rightResponded = $responses->filter(function (Response $response) {
            return $response->answer->direction == 'right';
        })->sum(function (Response $response) {
            return $response->answer->magnitude;
        });

        $this->attributes['value'] = round(50 - (($leftResponded / $leftMax) * 50) + (($rightResponded / $rightMax) * 50));
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
