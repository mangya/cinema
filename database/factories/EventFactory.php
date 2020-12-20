<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
	$category = ['Horror','Comedy','Thriller','Drama'];
    return [
        'name' => $faker->catchPhrase,
        'venue_id' => $faker->numberBetween(1,4),
        'price' => $faker->numberBetween(100,400),
        'seats_available' => $faker->numberBetween(20,30),
        'category' => $category[array_rand($category)],
        'description' => $faker->text($maxNbChars = 100),
        'code' => $faker->unique()->regexify('[A-Z0-9]{8}'),
        'start_date' => $faker->dateTimeBetween($startDate = '+5 days', $endDate = '+20 days', $timezone = null),
        'status' => array_rand([0,1]),
    ];
});
