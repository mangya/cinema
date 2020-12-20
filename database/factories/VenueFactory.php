<?php

use Faker\Generator as Faker;

$factory->define(App\Venue::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
        'slug' => $faker->unique()->regexify('[a-z]{6}'),
        'longitude' => $faker->latitude($min = 13, $max = 4),
        'latitude' => $faker->longitude($min = 3, $max = 14),
        'location_id' => $faker->numberBetween(1,4),
        'status' => 1,
    ];
});
