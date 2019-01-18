<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('123456'), //secret
        'remember_token' => str_random(10)
    ];
});
