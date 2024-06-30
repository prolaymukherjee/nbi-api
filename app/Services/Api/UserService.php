<?php

namespace App\Services\Api;

use App\Dtos\UserDto;
use App\Models\User;

class UserService
{
    public function createUser($userDto)
    {
        $user = User::create($userDto->toArray());

        return UserDto::fromModel($user);
    }
}
