<?php
namespace App\Repositories;
use App\Interfaces\OrderInterface;
use App\Order;

class OrderRepositorie extends EloquentRepository implements OrderInterface {

    public function getModel(): string
    {
        return Order::class;
    }
}
