<?php

use Faker\Generator as Faker;

$factory->define(App\Interest::class, function (Faker $faker) {
    return [
        'description' => $faker->company,
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
    ];
});
