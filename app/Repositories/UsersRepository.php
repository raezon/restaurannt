<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\User;

class UsersRepository implements UserRepositoryInterface
{
    public function create(array $user)
    {
    }

    public function getAll()
    {
        return User::all();
    }

    public function getById($userId)
    {
    }

    public function update($userId, array $user)
    {
    }

    public function delete($userId)
    {
    }
}
