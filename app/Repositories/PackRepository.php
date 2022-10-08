<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PackRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Pack;

class PackRepository implements PackRepositoryInterface
{

  public function getAll()
  {
      return Pack::all();
  }

  public function getById($id)
  {
      return Pack::find($id);
  }


  public function create(array $data, $product, $pictureName)
  {

    $data['photo'] = $pictureName;
    return Pack::create($data);
  }

  public function update($id, array $data)
  {
    Pack::where('id', $id)->update($data);
  }

  public function deleteById($id)
  {
      return Pack::destroy($id);
  }
}
