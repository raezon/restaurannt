<?php

namespace App\Interfaces\Repositories;

use Illuminate\Http\Request;

interface OrderItemRepositoryInterface
{
    public function getAll();
    public function getAllEn($id);
    public function getById($orderId);
    public function delete($orderId);
    public function create(array $order);
    public function bulkInsert($dto);
    public function update($orderId, array $order);
}
