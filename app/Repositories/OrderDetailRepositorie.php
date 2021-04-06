<?php
namespace App\Repositories;
use App\Interfaces\OrderDetailInterface;
use App\Orderdetail;

class OrderDetailRepositorie extends EloquentRepository implements OrderDetailInterface {

    public function getModel(): string
    {
        return Orderdetail::class;
    }

    public function statistical()
    {
        return $this->_model->selectRaw('sum(order_details.total_amount) as total, restaurants.name')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('tables', 'tables.id', '=', 'orders.table_id')
            ->join('restaurants', 'restaurants.id', 'tables.restaurant_id')
            ->groupBy(['restaurants.id'])
            ->get();
    }

    public function statisticaldate($restaurants, $days, $months, $years, $update_at)
    {
        return $this->_model->selectRaw('sum(order_details.total_amount) as total,restaurants.name')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('tables', 'tables.id', '=', 'orders.table_id')
            ->join('restaurants', 'restaurants.id', '=', 'tables.restaurant_id')
            ->where([
                'restaurant_id' => $restaurants,
                'order_details.order_date' => $update_at,
            ])
            ->groupBy(['restaurants.id'])->get()->toArray();
    }

    public function statisticalrestaurant($restaurants)
    {
       return $this->_model->selectRaw('sum(order_details.total_amount) as total,restaurants.name')
           ->join('orders', 'order_details.order_id', '=', 'orders.id')
           ->join('tables', 'tables.id', '=', 'orders.table_id')
           ->join('restaurants', 'restaurants.id', '=', 'tables.restaurant_id')
           ->where('restaurant_id', $restaurants)->groupBy(['restaurants.id'])
           ->get()->toArray();
    }
}
