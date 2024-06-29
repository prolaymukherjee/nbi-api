<?php

namespace App\Http\Resources;

use App\Dtos\IdeaDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IdeaResource extends JsonResource
{
    public function toArray($ideaDTO): array
    {
        return $ideaDTO->toArray();
    }
}
