<?php

namespace App\Repositories\Contracts;

interface FriendshipRepositoryInterface
{
    public function getPendingRequests(int $userId);
    public function getAcceptedFriends(int $userId);
    public function createFriendship(array $data);
    public function updateFriendshipStatus(int $id, string $status);
}
