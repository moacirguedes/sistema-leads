<?php

use Faker\Generator as Faker;

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

$factory->define(App\Lead::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'telephone' => $faker->PhoneNumber,
        'score' => random_int(0,5),
        'created_at' => $faker->dateTimeBetween($startDate = '2018-01-15 02:00:49', $endDate = 'now', $timezone = null),
        'updated_at' => date("Y-m-d H:i:s")
    ];
});