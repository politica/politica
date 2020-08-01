<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence,
        'direction' => random_int(0, 1) ? 'left' : 'right',
        'label' => $faker->name,
        'magnitude' => random_int(0, 100),
    ];
});
