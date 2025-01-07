<?php

namespace App\Repositories\Contracts;

interface LikeRepositoryInterface
{
    public function findByPostAndUser(int $postId, int $userId);
    public function createLike(array $data);
    public function deleteLike(int $postId, int $userId);
}
