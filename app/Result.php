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

    public function getIdeologiesAttribute()
    {
        // Initialise array to hold ideology requirements that the results match
        $requirements = collect();

        // Find ideology requirements that the results match
        foreach ($this->axes as $axis) {
            foreach ($axis->axis->ideologyRequirements()->where([
                ['min', '<=', $axis['value']],
                ['max', '>=', $axis['value']],
            ])->get() as $requirement) {
                $requirements->push($requirement);
            }
        }

        // Sort ideologies by number of result matches
        $ideologyMatches = collect(array_count_values($requirements->pluck('ideology_id')->toArray()))->sortDesc();

        // Calculate relevance threshold
        $relevanceThreshold = $ideologyMatches->unique()->slice(1, 1)->first() ?? $ideologyMatches->unique()->slice(0, 1)->first();

        // Return relevant ideologies
        return $ideologyMatches
            ->take(5)
            ->filter(function ($occurences, $ideologyId) use ($relevanceThreshold) {
                return $occurences >= $relevanceThreshold;
            })->map(function ($occurences, $ideologyId) {
                return Ideology::find($ideologyId);
            });
    }

    public function axes()
    {
        return $this->hasMany(ResultAxis::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
