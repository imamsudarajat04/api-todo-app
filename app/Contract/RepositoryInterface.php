<?php

namespace App\Contract;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RepositoryInterface
{
    public function getAllData(): Collection;
    public function getDataById(string $id): ?Model;
    public function addNewData(array $requestedData): Model;
    public function updateDataById(string $id, array $requestedData): bool;
    public function deleteDataById(string $id): bool;
}
