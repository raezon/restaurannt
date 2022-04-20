<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface OrderRepositoryRepositoryInterface 
{
    public function getAllFoods();
    public function getFoodById($articleId);
    public function deleteFoodById($articleId);
    public function createFood(array $article) ;
    public function updateFood($articleId, array $article);
}
