<?php

namespace App\Services\Api;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\UserServiceInterface;
use App\Dtos\UserDTO;

class UserService extends BaseService implements UserServiceInterface
{
    protected $__userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->__userRepository = $userRepository;
    }

    public function createUser($createUserRequest): ?UserDTO
    {
        $userDTO = UserDTO::fromRequest($createUserRequest);

        $user = $this->__userRepository->createUser($userDTO);

        return UserDTO::fromModel($user);
    }
}
