<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Test;
use Faker\Generator as Faker;

$factory->define(Test::class, function (Faker $faker) {
    return [
        'color_left' => 'red-500',
        'color_right' => 'blue-600',
        'icon_left' => 'economically-left.svg',
        'icon_right' => 'economically-right.svg',
        'label_left' => $faker->word,
        'label_right' => $faker->word,
        'name' => $faker->name,
    ];
});
