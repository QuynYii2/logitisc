<?php

use Faker\Generator as Faker;

$factory->define(\App\Menu::class, function (Faker $faker) {
    $restaurant = \App\Restaurant::pluck('id')->toArray();
    return [
        'food_name' => $faker->name,
        'price' =>$faker->numberBetween(5, 200),
        'restaurant_id' => $faker->randomElement($restaurant),
    ];
});
