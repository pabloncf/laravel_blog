<?php

namespace App\Services;

use App\DTO\CommentDTO;
use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentService
{
    protected $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function getCommentsByPostId(int $postId)
    {
        $comments = $this->commentRepository->getCommentsByPostId($postId);

        return $comments->map(function ($comment) {
            return new CommentDTO([
                'id' => $comment->id,
                'post_id' => $comment->post_id,
                'user_id' => $comment->user_id,
                'content' => $comment->content,
                'created_at' => $comment->created_at->toDateTimeString(),
                'updated_at' => $comment->updated_at->toDateTimeString(),
            ]);
        });
    }
}
