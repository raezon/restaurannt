<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface InventoryRepositoryInterface 
{
    public function getAll();
    public function getById($inventoryId);
    public function deleteById($inventoryId);
    public function create(array $inventory) ;
    public function update($inventoryId, array $inventory);
}
