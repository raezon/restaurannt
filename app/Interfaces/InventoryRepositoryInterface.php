<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface InventoryRepositoryRepositoryInterface 
{
    public function getAllInventory();
    public function getInventoryId($inventoryId);
    public function deleteInventoryById($inventoryId);
    public function createInventory(array $inventory) ;
    public function updateInventory($inventoryId, array $inventory);
}
