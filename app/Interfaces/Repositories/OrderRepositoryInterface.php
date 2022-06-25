<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface OrderRepositoryInterface 
{
    public function getAll();
    public function getById($orderId);
    public function delete($orderId);
    public function create(array $order) ;
    public function update($orderId, array $order);
}
