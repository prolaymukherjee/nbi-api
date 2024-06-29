<?php

namespace App\Services\Api;

use App\Dtos\UserDTO;
use App\Models\User;

class UserService
{
    public function createUser($userDTO)
    {
        $user = User::create($userDTO->toArray());

        return UserDTO::fromModel($user);
    }
}
