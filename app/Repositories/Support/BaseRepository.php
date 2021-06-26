<?php

namespace App\Repositories\Support;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Builder $query;

    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->query = $this->model->newQuery();
    }

    public function all($columns = ['*']): Collection
    {
        return $this->query->get($columns);
    }

    public function paginate($perPage = 15, $columns = ['*']): LengthAwarePaginator
    {
        return $this->query->paginate($perPage, $columns);
    }

    public function findById($id, $columns = ['*']): Model
    {
        return $this->query->find($id, $columns);
    }

    public function findByColumn($column, $value, $columns = ['*']): Model
    {
        return $this->query->where($column, '=', $value)->first($columns);
    }

    public function create(array $data): Model
    {
        return $this->query->create($data);
    }

    public function update(array $data, $id, $attribute = 'id'): int
    {
        return $this->query->where($attribute, '=', $id)->update($data);
    }

    public function updateByColumn(array $data, $column, $value, $operator): int
    {
        return $this->query->where($column, '=', $value)->update($data);
    }

    public function delete($id, $forceDelete = false): bool
    {
        if ($forceDelete){
            return $this->query->findOrFail($id)->forceDelete();
        }

        return !!$this->query->findOrFail($id)->delete();
    }

    public function deleteByColumn($column, $value): bool
    {
        return $this->query->where($column, '=', $value)->delete();
    }
}

