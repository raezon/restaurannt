<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface PackRepositoryInterface 
{
    public function getAll();
    public function getById($foodId);
    public function deleteById($foodId);
    public function create(array $data, $product, $pictureName) ;
    public function update($foodId, array $food);
}