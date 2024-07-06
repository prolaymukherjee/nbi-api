<?php

namespace App\Contracts\Repositories;

use App\Models\Idea;

interface IdeaRepositoryInterface
{
    public function createIdea($ideaDTO): Idea;
}
