<?php

namespace App\Http\Controllers;

use App\Services\LikeService;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function toggleLike(Request $request)
    {
        $data = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $status = $this->likeService->toggleLike($data['post_id'], $data['user_id']);
        $message = $status ? 'Like added' : 'Like removed';

        return response()->json(['message' => $message]);
    }
}

