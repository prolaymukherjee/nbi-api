<?php

namespace App\Http\Controllers\Api;

use App\Dtos\IdeaDTO;
use Illuminate\Http\Request;
use App\Services\Api\IdeaService;
use App\Http\Requests\IdeaRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\IdeaResource;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Common\ApiResponseService;

class IdeaController extends Controller
{
    protected $_ideaService;

    public function __construct(IdeaService $ideaService)
    {
        $this->_ideaService = $ideaService;
    }

    public function index()
    {
        //
    }


    public function store(IdeaRequest $ideaRequest)
    {
        $ideaDto = IdeaDTO::fromRequest($ideaRequest->validated());

        $idea = $this->_ideaService->createIdea($ideaDto);

        return ApiResponseService::success(
            new IdeaResource($idea),
            Response::HTTP_CREATED
        );
    }


    public function show(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
