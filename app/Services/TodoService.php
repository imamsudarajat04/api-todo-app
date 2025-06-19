<?php

namespace App\Services;

use App\Http\Resources\TodoResourceCollection;
use App\Repositories\TodoRepository;

class TodoService
{
    protected TodoRepository $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * @return array
     */
    public function getAllData(): array
    {
        return [
            'todos' => $this->todoRepository->getAllData(),
        ];
    }
}
