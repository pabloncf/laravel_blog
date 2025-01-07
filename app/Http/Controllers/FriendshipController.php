<?php

namespace App\Http\Controllers;

use App\Services\FriendshipService;
use Illuminate\Http\Request;

class FriendshipController extends Controller
{
    protected $friendshipService;

    public function __construct(FriendshipService $friendshipService)
    {
        $this->friendshipService = $friendshipService;
    }

    public function index()
    {
        $userId = auth()->id();
        $friends = $this->friendshipService->getAcceptedFriends($userId);
        return response()->json($friends);
    }

    public function requests()
    {
        $userId = auth()->id();
        $pendingRequests = $this->friendshipService->getPendingRequests($userId);
        return response()->json($pendingRequests);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'friend_id' => 'required|exists:users,id',
        ]);

        $friendship = $this->friendshipService->createFriendship(auth()->id(), $data['friend_id']);
        return response()->json($friendship, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required|in:accepted,rejected',
        ]);

        $friendship = $this->friendshipService->updateFriendshipStatus($id, $data['status']);
        return response()->json($friendship);
    }
}
