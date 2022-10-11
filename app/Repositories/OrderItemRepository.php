<?php

namespace App\Repositories;

use App\Interfaces\Repositories\OrderItemRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\OrderItem;

class OrderItemRepository implements OrderItemRepositoryInterface
{
    public function create(array $order)
    {
        return OrderItem::create($order);
    }

    public function bulkInsert($dto)
    {
        return OrderItem::insert($dto);
    }

    public function getAll()
    {
        return OrderItem::all();
    }
    public function getAllEn($id){
        return OrderItem::all()->where('order_id', $id);
    }

    public function getById($orderId)
    {
        $order = OrderItem::find($orderId);
        return $order;
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
