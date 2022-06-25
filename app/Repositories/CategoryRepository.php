<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface 
{
    public function getAll() 
    {
      return Category::all();
    }

    public function getById($id) 
    {
        return Category::find($id);
    }


    public function create(array $data) 
    {
    
        return Category::create($data);

    }

    public function update($id, array $data) 
    {
        Category::where('id', $id)->update($data);
    }

    public function deleteById($id) 
    {
        return Category::destroy($id);
    }
}
