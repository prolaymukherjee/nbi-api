<?php

namespace App\Http\Resources;

use App\Dtos\UserDto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($userDto): array
    {
        return $userDto->toArray();
    }
}
