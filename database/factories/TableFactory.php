<?php

use Faker\Generator as Faker;

$factory->define(\App\Table::class, function (Faker $faker) {
    $restaurant = \App\Restaurant::pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'status' => $faker->numberBetween(5, 200),
        'restaurant_id' => $faker->randomElement($restaurant),
    ];
});
