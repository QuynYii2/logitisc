<?php

use Faker\Generator as Faker;

$factory->define(\App\Material::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'count' => $faker->numberBetween(5, 200)
    ];
});
