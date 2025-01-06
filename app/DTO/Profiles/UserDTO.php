<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $email;
    public string $username;
    public ?string $profile_picture;
    public string $bio;
    public array $posts = [];
    public array $friends = [];

    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
    }
}
