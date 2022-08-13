<?php

namespace App\Services;

use Illuminate\Http\Request;

/**
 * Class StockService
 * @package App\Services
 */
class StockService
{
    public function updateStock($products,$inventoryRepository)
    {
        foreach ($products as $product) {

            $result = $product->stocks[0]->quantity - $product->stocks[0]->pivot->qunatity;
            $inventoryRepository->update($product->stocks[0]->id, ['quantity' => $result]);
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
