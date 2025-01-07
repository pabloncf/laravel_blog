<?php

namespace App\Services;

use App\DTO\PostDTO;
use App\Repositories\Contracts\PostRepositoryInterface;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getPostDetails(int $id)
    {
        $post = $this->postRepository->findById($id);

        return new PostDTO([
            'id' => $post->id,
            'user_id' => $post->user_id,
            'content' => $post->content,
            'image' => $post->image,
            'likes_count' => $post->likes_count,
            'created_at' => $post->created_at->toDateTimeString(),
            'updated_at' => $post->updated_at->toDateTimeString(),
            'comments' => $post->comments->toArray(),
        ]);
    }
}
