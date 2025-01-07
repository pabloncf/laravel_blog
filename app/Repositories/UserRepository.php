<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function findById(int $id)
    {
        return User::findOrFail($id);
    }

    public function getAllUsers()
    {
        return User::all();
    }
}
