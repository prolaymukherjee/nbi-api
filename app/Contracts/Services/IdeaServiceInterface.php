<?php

namespace App\Contracts\Services;

use App\Dtos\IdeaDTO;

interface IdeaServiceInterface
{
    public function createIdea($createIdeaRequest): IdeaDTO;
}
