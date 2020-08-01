<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'avatar' => 'https://cdn.discordapp.com/avatars/643705992651079681/a3efc5189f2d2373230ad96dc2244f25?size=720',
        'discord_id' => rand(1, 9999999999),
        'email' => $faker->email,
        'name' => $faker->name,
        'remember_token' => Str::random(10),
    ];
});
