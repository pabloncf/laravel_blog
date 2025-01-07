<?php

namespace App\Repositories\Contracts;

interface PostRepositoryInterface
{
    public function findById(int $id);
    public function getPostsByUserId(int $userId);
    public function createPost(array $data);
    public function updatePost(int $id, array $data);
    public function deletePost(int $id);
}
