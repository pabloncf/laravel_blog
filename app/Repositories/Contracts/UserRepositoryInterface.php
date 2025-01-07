<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function findById(int $id);
    public function getAllUsers();
    public function createUser(array $data);
    public function updateUser(int $id, array $data);
    public function deleteUser(int $id);
}
