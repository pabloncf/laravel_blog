<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return response()->json($posts);
    }

    public function show($id)
    {
        $post = $this->postService->getPostDetails($id);
        return response()->json($post);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $post = $this->postService->createPost($data);
        return response()->json($post, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'content' => 'nullable|string',
            'image' => 'nullable|image',
        ]);

        $post = $this->postService->updatePost($id, $data);
        return response()->json($post);
    }

    public function destroy($id)
    {
        $this->postService->deletePost($id);
        return response()->json(['message' => 'Post deleted successfully']);
    }
}
