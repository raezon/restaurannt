<?php

namespace App\Repositories;

use App\Interfaces\FoodsRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Food;

class FoodsRepository implements FoodsRepositoryInterface 
{

    public function create(array $food) 
    {
    
       

    }

    public function getAll() 
    {
      return Food::all();
    }

    public function getById($foodId) 
    {
       
    }

    public function update($foodId, array $food) 
    {
        
    }

    public function deleteById($foodId) 
    {
      
    }




}
