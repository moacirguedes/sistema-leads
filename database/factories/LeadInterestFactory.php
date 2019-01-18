<?php

use Faker\Generator as Faker;

$factory->define(App\LeadInterest::class, function (Faker $faker) {
    return [
        'lead_id' => $faker->numberBetween($min = 1, $max = 30),
        'interest_id' => $faker->numberBetween($min = 1, $max = 30),
        'client' => $faker->boolean($chanceOfGettingTrue = 50),
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
    ];
});
