<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class CommentDTO extends DataTransferObject
{
    public int $id;
    public int $post_id;
    public int $user_id;
    public string $content;
    public string $created_at;
    public string $updated_at;

    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
    }
}
