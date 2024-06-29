<?php

namespace App\Http\Resources;

use App\Dtos\UserDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($userDTO): array
    {
        return $userDTO->toArray();
    }
}
