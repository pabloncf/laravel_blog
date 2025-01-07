<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function findById(int $id)
    {
        return Post::with('comments', 'likes')->findOrFail($id);
    }

    public function getPostsByUserId(int $userId)
    {
        return Post::where('user_id', $userId)->with('comments', 'likes')->get();
    }

    public function createPost(array $data)
    {
        return Post::create($data);
    }

    public function updatePost(int $id, array $data)
    {
        $post = $this->findById($id);
        $post->update($data);
        return $post;
    }

    public function deletePost(int $id)
    {
        $post = $this->findById($id);
        return $post->delete();
    }
}
