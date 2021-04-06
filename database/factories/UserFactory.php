<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\User::class, function (Faker $faker) {
    $roles = \App\Role::pluck('id')->toArray();
    $restaurant = \App\Restaurant::pluck('id')->toArray();
    dd($faker->randomElement($restaurant));
    return [
        'name' => $faker->name,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'email' => $faker->email,
        'role_id' => $faker->randomElement($roles),
        'restaurant_id' => $faker->randomElement($restaurant),
        'remember_token' => str_random(10),
    ];
});
