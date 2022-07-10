<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ProductPackRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\PackProduct;

class PackProductRepository implements  ProductPackRepositoryInterface 

{

  public function getAll()
  {
    return PackProduct::all();
  }

  public function getById($id)
  {
    return PackProduct::find($id);
  }
  public function getByCategory($name)
  {
    return PackProduct::where('category', $name)
      ->get();
  }
  public function create(array $data)
  {

    return PackProduct::create($data);
  }

  public function update($id, array $data)
  {
    PackProduct::where('id', $id)->update($data);
  }

  public function deleteById($id)
  {
    return PackProduct::destroy($id);
  }
}
