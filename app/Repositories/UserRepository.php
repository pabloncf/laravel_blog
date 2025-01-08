<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function findById($id)
    {
        // if (!is_numeric($id)) {
        //     throw new \InvalidArgumentException('O ID deve ser um número válido.');
        // }

        return User::with(['posts', 'friends'])->findOrFail($id);
    }


    public function getAllUsers()
    {
        return User::all();
    }
}
