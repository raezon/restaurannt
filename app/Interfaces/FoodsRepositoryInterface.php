<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface FoodsRepositoryRepositoryInterface 
{
    public function getAllFoods();
    public function getFoodById($foodId);
    public function deleteFoodById($foodId);
    public function createFood(array $food) ;
    public function updateFood($foodId, array $food);
}