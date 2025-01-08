<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserProfile($id)
    {
        try {
            $user = $this->userRepository->findById($id);

            return new UserDTO([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->username,
                'profile_picture' => $user->profile_picture,
                'bio' => $user->bio,
                'created_at' => $user->created_at->toDateTimeString(),
                'updated_at' => $user->updated_at->toDateTimeString(),
                'posts' => $user->posts ? $user->posts->toArray() : [],
                'friends' => $user->friends ? $user->friends->toArray() : [],
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Usuário não encontrado ou relações inválidas: ' . $e->getMessage());
        }
    }
}
