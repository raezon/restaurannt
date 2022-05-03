<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface FoodRepositoryInterface 
{
    public function getAll();
    public function getById($foodId);
    public function deleteById($foodId);
    public function create(array $food) ;
    public function update($foodId, array $food);
}