<?php
namespace App\Repositories;
use App\Interfaces\TableInterface;
use App\Table;

class TableRepositorie extends EloquentRepository implements TableInterface {

    public function getModel(): string
    {
        return Table::class;
    }

    public function getTableByRestaurantid($idRestaurant)
    {
        return $this->_model->where('restaurant_id', $idRestaurant)->get();
    }
}
