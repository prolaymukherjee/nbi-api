<?php

namespace App\Services\Api;

use App\Contracts\Services\IIdeaService;
use App\Dtos\IdeaDTO;
use App\Models\Idea;

class IdeaService extends BaseService implements IIdeaService
{
    public function createIdea($ideaDTO): IdeaDTO
    {
        $idea = Idea::create([
            'user_id' => $ideaDTO->user_id,
            'title' => $ideaDTO->title,
            'description' => $ideaDTO->description,
        ]);

        return IdeaDto::fromModel($idea);
    }
}
