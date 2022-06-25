<?php

namespace App\Repositories;


use App\Interfaces\Repositories\RoomsRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Rooms;

class RoomsRepository implements RoomsRepositoryInterface 
{
    public function getAll()
    {
        return Rooms::all();
    }
  
    public function getById($id)
    {
        return Rooms::find($id);
    }
  
  
    public function create(array $data)
    {
  
        return Rooms::create($data);
    }
  
    public function update($id, array $data)
    {
        Rooms::where('id', $id)->update($data);
    }
  
    public function delete($id)
    {
        return Rooms::destroy($id);
    }
}
