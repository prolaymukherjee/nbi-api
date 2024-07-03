<?php

namespace App\Http\Controllers\Api;

use App\Dtos\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\Api\UserService;
use App\Services\Common\ApiResponseService;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    protected $_userService;

    public function __construct(UserService $userService)
    {
        $this->_userService = $userService;
    }

    public function create(UserRequest $userRequest)
    {
        $userDTO = UserDTO::fromRequest($userRequest->validated());

        $user = $this->_userService->createUser($userDTO);

        return ApiResponseService::success(
            new UserResource($user),
            Response::HTTP_CREATED
        );
    }
}
