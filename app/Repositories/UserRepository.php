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

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function updateUser(int $id, array $data)
    {
        $user = $this->findById($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser(int $id)
    {
        $user = $this->findById($id);
        return $user->delete();
    }
}
