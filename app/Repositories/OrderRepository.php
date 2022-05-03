<?php

namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function create(array $order)
    {
        $plats = [1, 2, 3, 4];
        return $plats;
    }

    public function getAll()
    {
        return Order::all();
    }

    public function getById($orderId)
    {
        $order = Order::find($orderId);
        return $order->food;
    }

    public function update($orderId, array $order)
    {
        //update order if want to change it before 5 min
    }

    public function delete($orderId)
    {
        //delete order in case client left
    }
}
