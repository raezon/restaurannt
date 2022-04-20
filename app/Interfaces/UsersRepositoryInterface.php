<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface UserRepositoryRepositoryInterface 
{
    public function getAllUser();
    public function getUserById($userId);
    public function deleteUserById($userId);
    public function createUser(array $user) ;
    public function updateUser($userId, array $user);
}

