<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface 
{
    public function getAllCategories();
    public function getCategoryById($categoryId);
    public function deleteCategoryById($categoryId);
    public function createCategory(array $category) ;
    public function updateCategory($categoryId, array $category);
}

