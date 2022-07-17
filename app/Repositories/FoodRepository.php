<?php

namespace App\Repositories;

use App\Interfaces\Repositories\FoodRepositoryInterface;
use App\Interfaces\Repositories\PlatRepositoryInterface;
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
  public function getByCategory($name)
  {
    return Food::where('category', $name)
      ->get();
  }
  public function create(array $data, $productId, $pictureName)
  {
    $data['product_id'] = $productId;
    $data['picture'] = $pictureName;
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
