<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface FoodRepositoryInterface 
{
    public function getAll();
    public function getById($foodId);
    public function getByCategory($name);
    public function deleteById($foodId);
    public function create(array $food,$productId,$pictureName) ;
    public function update($foodId, array $food);
}