<?php

namespace App\Repositories;

use App\Interfaces\PlatRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Plat;

class PlatRepository implements PlatRepositoryInterface
{

  public function create(array $food)
  {
    //we need to 


  }

  public function getAll()
  {
    $plats = Plat::find(1);

    return  $plats->ingrediants;
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
