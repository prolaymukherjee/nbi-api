<?php

namespace App\Services\Api;

use App\Dtos\IdeaDto;
use App\Models\Idea;

class IdeaService
{
    public function createIdea($ideaDto): IdeaDto
    {
        $idea = Idea::create([
            'user_id' => $ideaDto->user_id,
            'title' => $ideaDto->title,
            'description' => $ideaDto->description,
        ]);

        return IdeaDto::fromModel($idea);
    }
}
