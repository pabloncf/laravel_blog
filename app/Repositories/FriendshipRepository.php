<?php

namespace App\Repositories;

use App\Models\Friendships;
use App\Repositories\Contracts\FriendshipRepositoryInterface;

class FriendshipRepository implements FriendshipRepositoryInterface
{
    public function getPendingRequests(int $userId)
    {
        return Friendships::where('friend_id', $userId)->where('status', 'pending')->get();
    }

    public function getAcceptedFriends(int $userId)
    {
        return Friendships::where(function ($query) use ($userId) {
            $query->where('user_id', $userId)
                ->orWhere('friend_id', $userId);
        })->where('status', 'accepted')->get();
    }

    public function createFriendship(array $data)
    {
        return Friendships::create($data);
    }

    public function updateFriendshipStatus(int $id, string $status)
    {
        $friendship = Friendships::findOrFail($id);
        $friendship->status = $status;
        $friendship->save();
        return $friendship;
    }
}
