<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function findById(int $id);
    public function getAllUsers();
}
