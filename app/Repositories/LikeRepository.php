<?php

namespace App\Repositories;

use App\Models\Likes;
use App\Repositories\Contracts\LikeRepositoryInterface;

class LikeRepository implements LikeRepositoryInterface
{
    public function findByPostAndUser(int $postId, int $userId)
    {
        return Likes::where('post_id', $postId)->where('user_id', $userId)->first();
    }

    public function createLike(array $data)
    {
        return Likes::create($data);
    }

    public function deleteLike(int $postId, int $userId)
    {
        return Likes::where('post_id', $postId)->where('user_id', $userId)->delete();
    }
}
