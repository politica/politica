<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultAxis extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getLabelAttribute()
    {
        return optional($this->axis->regions()->where([
            ['min', '<=', $this->value],
            ['max', '>=', $this->value],
        ])->first())->label;
    }

    public function axis()
    {
        return $this->belongsTo(Axis::class);
    }
}
