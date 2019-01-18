<?php

use Faker\Generator as Faker;

$factory->define(App\Channel::class, function (Faker $faker) {
    $channel = [
        "facebook",
        "twitter",
        "instagram",
        "email",
        "form-web",
    ];

    return [
        'name' => $channel[array_rand($channel)],
    ];
});
