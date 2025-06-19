<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResourceCollection;
use App\Services\TodoService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoController extends Controller
{
    protected TodoService $todoService;

    public function __construct(TodoService $todoService)
    {
        $this->todoService = $todoService;
        $this->responseMessage = [
            "index" => "Successfully Get All Todos",
        ];
    }

    /**
     * @return array
     */
    public function index(): array
    {
        return [
            "data"    => TodoResourceCollection::collection($this->todoService->getAllData()),
            "message" => $this->getResponseMessage(__FUNCTION__),
        ];
    }
}
