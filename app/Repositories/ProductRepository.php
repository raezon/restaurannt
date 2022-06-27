<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

  public function getAll()
  {
    return Product::all();
  }
  public function getMany($ids)
  {
    return Product::find($ids);
  }


  public function getById($id)
  {
    return Product::find($id);
  }
  
  public function getByCategory($name)
  {
    return Product::where('category', $name)
      ->get();
  }

  public function create(array $data)
  {

    return Product::create($data);
  }

  public function update($id, array $data)
  {
    Product::where('id', $id)->update($data);
  }

  public function deleteById($id)
  {
    return Product::destroy($id);
  }
}
