<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface ProductRepositoryInterface 
{
    public function getAll();
    public function getMany($ids);
    public function getById($productId);
    public function deleteById($productId);
    public function getByCategory($name);
    public function create(array $product) ;
    public function update($productId, array $product);
}