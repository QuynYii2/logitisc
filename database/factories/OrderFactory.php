<?php

use Faker\Generator as Faker;

$factory->define(\App\Order::class, function (Faker $faker) {
    $user = \App\User::pluck('id')->toArray();
    $table = \App\Table::pluck('id')->toArray();
    return [
        'total_amount' => $faker->numberBetween(5,200),
        'status' => $faker->numberBetween(5,200),
        'process_by' => $faker->randomElement($user),
        'table_id' => $faker->randomElement($table)
    ];
});
