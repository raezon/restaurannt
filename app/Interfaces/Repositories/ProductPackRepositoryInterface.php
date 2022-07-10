<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface ProductPackRepositoryInterface 
{
    public function getAll();
    public function getById($foodId);
    public function deleteById($foodId);
    public function create(array $food) ;
    public function update($foodId, array $food);
}