<?php

use Faker\Generator as Faker;

$factory->define(App\Location::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->city,
        'slug' => $faker->unique()->regexify('[A-Z]{2}'),
        'longitude' => $faker->latitude($min = 13, $max = 4) ,
        'latitude' => $faker->longitude($min = 3, $max = 14),
        'status' => 1,
    ];
});
