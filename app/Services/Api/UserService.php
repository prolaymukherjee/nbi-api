<?php

namespace App\Services\Api;

use App\Contracts\Services\IUserService;
use App\Dtos\UserDTO;
use App\Models\User;

class UserService extends BaseService implements IUserService
{
    public function createUser(UserDTO $userDTO): ?UserDTO
    {
        $user = User::create($userDTO->toArray());

        return UserDTO::fromModel($user);
    }
}
