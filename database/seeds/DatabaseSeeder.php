<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(FoodTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(RestaurantTableSeeder::class);
        $this->call(UserTableSeeder::class);
//        $this->call(TableTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(MaterialRestaurantTableSeeder::class);
    }
}
