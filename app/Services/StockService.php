<?php

namespace App\Services;

/**
 * Class StockService
 * @package App\Services
 */
class StockService
{
    public function updateStock($products)
    {
        foreach ($products as $product) {

            $result = $product->stocks[0]->quantity - $product->stocks[0]->pivot->qunatity;
            $this->inventoryRepository->update($product->stocks[0]->id, ['quantity' => $result]);
        }
    }
}
