<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface ProductRepositoryInterface 
{
    public function getAll();
    public function getById($productId);
    public function deleteById($productId);
    public function create(array $product) ;
    public function update($productId, array $product);
}