<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function effects()
    {
        return $this->hasMany(QuestionEffect::class);
    }

    public function suggestions()
    {
        return $this->hasMany(QuestionSuggestion::class);
    }
}
