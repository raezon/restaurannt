<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PlatRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Plat;

class PlatRepository implements PlatRepositoryInterface
{

  public function getAll()
  {
      return Plat::all();
  }

  public function getById($id)
  {
      return Plat::find($id);
  }


  public function create(array $data, $productId, $pictureName)
  {
    $data['product_id'] = $productId;
    $dto['picture'] = $pictureName;
    return Plat::create($data);
  }

  public function update($id, array $data)
  {
      Plat::where('id', $id)->update($data);
  }

  public function deleteById($id)
  {
      return Plat::destroy($id);
  }
}
