<?php

namespace App\Repositories\Contracts;

interface CommentRepositoryInterface
{
    public function findById(int $id);
    public function getCommentsByPostId(int $postId);
    public function createComment(array $data);
    public function deleteComment(int $id);
}
