<?php

namespace App\Services;

use App\DTO\FriendshipDTO;
use App\Repositories\Contracts\FriendshipRepositoryInterface;

class FriendshipService
{
    protected $friendshipRepository;

    public function __construct(FriendshipRepositoryInterface $friendshipRepository)
    {
        $this->friendshipRepository = $friendshipRepository;
    }

    public function getFriendRequests(int $userId)
    {
        $friendships = $this->friendshipRepository->getPendingRequests($userId);

        return $friendships->map(function ($friendship) {
            return new FriendshipDTO([
                'id' => $friendship->id,
                'user_id' => $friendship->user_id,
                'friend_id' => $friendship->friend_id,
                'status' => $friendship->status,
                'created_at' => $friendship->created_at->toDateTimeString(),
                'updated_at' => $friendship->updated_at->toDateTimeString(),
            ]);
        });
    }
}
