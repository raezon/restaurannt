<?php
namespace App\Interfaces\Repositories;
use Illuminate\Http\Request;

interface RoomsRepositoryInterface 
{
    public function getAll();
    public function getById($roomId);
    public function delete($roomId);
    public function create(array $room) ;
    public function update($roomId, array $room);
}

