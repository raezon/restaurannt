<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ProductRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stock;

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
  public function getStocks($ids)
  {

    return Product::whereIn('id', $ids)->with(
      'stocks'
    )->get();

    //  return Stock::with('products')->where('id',99)->get();
  }



  public function getById($id)
  {
    return Product::find($id);
  }

  public function getByCategory($id)
  {
    return Category::with('products')->where('id', $id)->first();
  }

  public function create(array $data, $pictureName)
  {
    $data['picture'] = $pictureName;
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
