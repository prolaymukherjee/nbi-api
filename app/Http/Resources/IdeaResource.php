<?php

namespace App\Http\Resources;

use App\Dtos\IdeaDto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IdeaResource extends JsonResource
{
    public function toArray($ideaDto): array
    {
        return $ideaDto->toArray();
    }
}
