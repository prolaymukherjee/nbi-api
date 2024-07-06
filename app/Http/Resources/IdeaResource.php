<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IdeaResource extends JsonResource
{
    public function toArray($ideaDTO): array
    {
        return $this->resource->toArray();
    }
}
