<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface RoomsRepositoryRepositoryInterface 
{
    public function getAllRooms();
    public function getRoomById($roomId);
    public function deleteRoomById($roomId);
    public function createRoom(array $room) ;
    public function updateRoom($roomId, array $room);
}

