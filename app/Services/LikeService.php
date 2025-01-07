<?php

namespace App\Services;

use App\Repositories\Contracts\LikeRepositoryInterface;

class LikeService
{
    protected $likeRepository;

    public function __construct(LikeRepositoryInterface $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }

    public function toggleLike(int $postId, int $userId)
    {
        $like = $this->likeRepository->findByPostAndUser($postId, $userId);

        if ($like) {
            $this->likeRepository->deleteLike($postId, $userId);
            return false;
        }

        $this->likeRepository->createLike([
            'post_id' => $postId,
            'user_id' => $userId,
        ]);

        return true;
    }
}
