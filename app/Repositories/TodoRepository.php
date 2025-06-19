<?php

namespace App\Repositories;

use App\Contract\RepositoryInterface;
use App\Models\Todo;
use Illuminate\Support\Collection;

class TodoRepository extends BaseRepository
{
    public function __construct(Todo $todo)
    {
        parent::__construct($todo);
    }

    // Write code in here
}
