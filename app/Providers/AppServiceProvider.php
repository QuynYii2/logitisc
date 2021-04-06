<?php

namespace App\Providers;

use App\Interfaces\FoodInterface;
use App\Interfaces\MaterialInterface;
use App\Interfaces\MenuInterface;
use App\Interfaces\OrderDetailInterface;
use App\Interfaces\OrderInterface;
use App\Interfaces\RestaurantInterface;
use App\Interfaces\RoleInterface;
use App\Interfaces\TableInterface;
use App\Interfaces\UserInterface;
use App\Repositories\FoodRepositorie;
use App\Repositories\MaterialRepositorie;
use App\Repositories\MenuRepositorie;
use App\Repositories\OrderDetailRepositorie;
use App\Repositories\OrderRepositorie;
use App\Repositories\RestaurantRepositorie;
use App\Repositories\RoleRepositorie;
use App\Repositories\TableRepositorie;
use App\Repositories\UserRepositorie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FoodInterface::class, FoodRepositorie::class);
        $this->app->bind(MaterialInterface::class, MaterialRepositorie::class);
        $this->app->bind(MenuInterface::class, MenuRepositorie::class);
        $this->app->bind(OrderInterface::class, OrderRepositorie::class);
        $this->app->bind(RestaurantInterface::class, RestaurantRepositorie::class);
        $this->app->bind(TableInterface::class, TableRepositorie::class);
        $this->app->bind(UserInterface::class, UserRepositorie::class);
        $this->app->bind(RoleInterface::class, RoleRepositorie::class);
        $this->app->bind(OrderDetailInterface::class, OrderDetailRepositorie::class);
    }
}
