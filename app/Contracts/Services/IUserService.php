<?php

namespace App\Contracts\Services;

use App\Dtos\UserDTO;

interface IUserService
{
    public function createUser(UserDTO $userDTO): ?UserDTO;
}
