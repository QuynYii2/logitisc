<?php

use Illuminate\Database\Seeder;

class MaterialRestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\MaterialRestaurant::class, 10)->create();
    }
}
