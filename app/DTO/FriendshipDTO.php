<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class FriendshipDTO extends DataTransferObject
{
    public int $id;
    public int $user_id;
    public int $friend_id;
    public string $status;
    public string $created_at;

    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
    }
}
