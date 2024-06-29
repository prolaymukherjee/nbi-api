<?php

namespace App\Services\Api;

use App\Dtos\IdeaDTO;
use App\Models\Idea;

class IdeaService
{
    public function createIdea($ideaDTO): IdeaDTO
    {
        $idea = Idea::create([
            'user_id' => $ideaDTO->user_id,
            'title' => $ideaDTO->title,
            'description' => $ideaDTO->description,
        ]);

        return IdeaDTO::fromModel($idea);
    }
}
