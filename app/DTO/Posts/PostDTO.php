<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class PostDTO extends DataTransferObject
{
    public int $id;
    public int $user_id;
    public string $content;
    public ?string $image;
    public int $likes_count;
    public string $created_at;
    public string $updated_at;
    public array $comments = [];

    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
    }
}

