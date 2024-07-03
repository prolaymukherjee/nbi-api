<?php

namespace App\Contracts\Services;

use App\Dtos\IdeaDTO;

interface IIdeaService
{
    public function createIdea(IdeaDTO $ideaDTO): IdeaDTO;
}
