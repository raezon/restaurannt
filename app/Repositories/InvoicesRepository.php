<?php

namespace App\Repositories;

use App\Interfaces\Repositories\InvoicesRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Order;

class InvoicesRepository implements InvoicesRepositoryInterface 
{
    public function getAll()
    {

        return Order::all();
    }

    public function getById($orderId)
    {
        $order = Order::find($orderId);
        return $order;
    }
}
