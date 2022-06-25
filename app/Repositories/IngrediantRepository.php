<?php

namespace App\Repositories;

use App\Interfaces\Repositories\IngrediantRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Ingrediant;

class IngrediantRepository implements IngrediantRepositoryInterface
{

    public function getAll()
    {
        return Ingrediant::all();
    }

    public function getById($id)
    {
        return Ingrediant::find($id);
    }


    public function create(array $data)
    {

        return Ingrediant::create($data);
    }

    public function update($id, array $data)
    {
        Ingrediant::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Ingrediant::destroy($id);
    }
}
