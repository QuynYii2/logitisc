<?php
namespace App\Repositories;;
use App\Interfaces\RestaurantInterface;
use App\Restaurant;

class RestaurantRepositorie extends EloquentRepository implements RestaurantInterface {

    public function getModel(): string
    {
        return Restaurant::class;
    }

    public function listRestaurantbyid($idRestaurant)
    {
        return $this->_model->where('id', $idRestaurant)->get();
    }
}
