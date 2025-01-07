<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index($postId)
    {
        $comments = $this->commentService->getCommentsByPostId($postId);
        return response()->json($comments);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $comment = $this->commentService->createComment($data);
        return response()->json($comment, 201);
    }

    public function destroy($id)
    {
        $this->commentService->deleteComment($id);
        return response()->json(['message' => 'Comment deleted successfully']);
    }
}
