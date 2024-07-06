<?php

namespace App\Services\Api;

use App\Contracts\Repositories\IdeaRepositoryInterface;
use App\Contracts\Services\IdeaServiceInterface;
use App\Dtos\IdeaDTO;

class IdeaService extends BaseService implements IdeaServiceInterface
{
    protected $__ideaRepository;

    public function __construct(IdeaRepositoryInterface $ideaRepository)
    {
        $this->__ideaRepository = $ideaRepository;
    }

    public function createIdea($createIdeaRequest): IdeaDTO
    {
        $ideaDTO = IdeaDTO::fromRequest($createIdeaRequest);

        $idea = $this->__ideaRepository->createIdea($ideaDTO);

        return IdeaDto::fromModel($idea);
    }
}
