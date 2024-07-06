<?php

namespace App\Repositories;

use App\Contracts\Repositories\IdeaRepositoryInterface;
use App\Models\Idea;

class IdeaRepository extends BaseRepository implements IdeaRepositoryInterface
{
    protected $__model;

    public function __construct(Idea $model)
    {
        $this->__model = $model;
    }

    public function createIdea($ideaDTO): Idea
    {
        return $this->executeInTransaction(function () use ($ideaDTO) {
            $idea = $this->__model->create([
                'user_id' => $ideaDTO->getUserId(),
                'title' => $ideaDTO->getTitle(),
                'description' => $ideaDTO->getDescription(),
            ]);

            return $idea;
        });
    }
}
