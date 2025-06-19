<?php

namespace App\Repositories;

use App\Contract\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * TODO: Improve code soon
 */
class BaseRepository implements RepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function getAllData(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param string $id
     * @return Model|null
     */
    public function getDataById(string $id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @param array $requestedData
     * @return Model
     */
    public function addNewData(array $requestedData): Model
    {
        return $this->model->create($requestedData);
    }

    /**
     * @param string $id
     * @param array $requestedData
     * @return bool
     */
    public function updateDataById(string $id, array $requestedData): bool
    {
        $item = $this->model->find($id);
        if (!$item) {
            return false;
        }

        return $item->update($requestedData);
    }

    /**
     * @param string $id
     * @return bool
     */
    public function deleteDataById(string $id): bool
    {
        $item = $this->model->find($id);
        if (!$item) {
            return false;
        }

        return $item->delete();
    }
}
