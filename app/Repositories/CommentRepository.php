<?php

namespace App\Repositories;

use App\Models\Comments;
use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    public function findById(int $id)
    {
        return Comments::findOrFail($id);
    }

    public function getCommentsByPostId(int $postId)
    {
        return Comments::where('post_id', $postId)->get();
    }

    public function createComment(array $data)
    {
        return Comments::create($data);
    }

    public function deleteComment(int $id)
    {
        $comment = $this->findById($id);
        return $comment->delete();
    }
}
