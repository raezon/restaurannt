<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface StockRepositoryRepositoryInterface 
{
    public function getAllStocks();
    public function getStockById($stockId);
    public function deleteFoodById($stockId);
    public function createStock(array $stock) ;
    public function updateStock($stockId, array $stock);
}

