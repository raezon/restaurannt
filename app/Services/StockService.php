<?php

namespace App\Services;

use Illuminate\Http\Request;

/**
 * Class StockService
 * @package App\Services
 */
class StockService
{
    public function updateStock($orderItems,$inventoryRepository)
    {
        foreach ($orderItems as $orderItem) {
         
            $result = $orderItem->product->stocks[0]->quantity -($orderItem->product->stocks[0]->pivot->quantity*$orderItem->qunatity) ;
        
            $inventoryRepository->update($orderItem->product->stocks[0]->id, ['quantity' => $result]);
        }
    }
    public function attachPivotTable(Request $request, $product)
    {
        $ingrediants = $request->input('ingrediants');
        $quantities = $request->input('quantity');

        for ($i = 0; $i < sizeof($request->input('ingrediants')); $i++) {
            $product->stocks()->attach($ingrediants[$i], ['quantity' => $quantities[$i]]);
        }
    }
}
