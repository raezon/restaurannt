<?php

namespace App\Repositories;

use App\Interfaces\FoodRepositoryInterface;
use App\Interfaces\PlatRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Food;

class FoodRepository implements FoodRepositoryInterface
{

  public function getAll()
  {
      return Food::all();
  }

  public function getById($id)
  {
      return Food::find($id);
  }


  public function create(array $data)
  {

      return Food::create($data);
  }

  public function update($id, array $data)
  {
    Food::where('id', $id)->update($data);
  }

  public function deleteById($id)
  {
      return Food::destroy($id);
  }
}
