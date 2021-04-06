<?php

use Faker\Generator as Faker;

$factory->define(\App\MaterialRestaurant::class, function (Faker $faker) {
    $material = \App\Material::pluck('id')->toArray();
    $restaurant = \App\Restaurant::pluck('id')->toArray();
    return [
        'restaurant_id' => $faker->randomElement($restaurant),
        'material_id' => $faker->randomElement($material)
    ];
});
