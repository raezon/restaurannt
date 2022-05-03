<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface UserRepositoryInterface 
{
    public function getAll();
    public function getById($userId);
    public function delete($userId);
    public function create(array $user) ;
    public function update($userId, array $user);
}

