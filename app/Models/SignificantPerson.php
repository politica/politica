<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignificantPerson extends Model
{
    protected $guarded = [];

    public function ideology()
    {
        return $this->belongsTo(Ideology::class);
    }
}
