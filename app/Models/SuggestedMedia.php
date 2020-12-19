<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestedMedia extends Model
{
    protected $guarded = [];

    public function ideology()
    {
        return $this->belongsTo(Ideology::class);
    }
}
