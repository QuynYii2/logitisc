<?php

use Faker\Generator as Faker;

$factory->define(\App\Food::class, function (Faker $faker) {
    $menu = \App\Menu::pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(5, 200),
        'menu_id' => $faker->randomElement($menu),
    ];
});
