<?php
namespace  App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface 
{
    public function getAll();
    public function getById($categoryId);
    public function deleteById($categoryId);
    public function create(array $category) ;
    public function update($categoryId, array $category);
}

