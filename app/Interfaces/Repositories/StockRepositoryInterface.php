<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface StockRepositoryInterface 
{
    public function getAll();
    public function getById($stockId);
    public function delete($stockId);
    public function create(array $stock) ;
    public function update($stockId, array $stock);
}

