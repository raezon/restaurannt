<?php

namespace App\Repositories;

use App\Interfaces\InventoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Stock;

class InventoryRepository implements InventoryRepositoryInterface
{
    public function getAll()
    {
        return Stock::all();
    }

    public function getById($id)
    {
        return Stock::find($id);
    }


    public function create(array $data)
    {

        return Stock::create($data);
    }

    public function update($id, array $data)
    {
        Stock::where('id', $id)->update($data);
    }

    public function deleteById($id)
    {
        return Stock::destroy($id);
    }
}
