<?php

namespace App\Services;

/**
 * Class OrderService
 * @package App\Services
 */
class OrderService
{
    public function createOrder($order, $ids, $userId)
    {

        foreach ($ids as $id) {
            $dto['product_id'] = $id;
            $dto['user_id'] = $userId;
            $order->create($dto);
        }

        return "success";
    }
}
