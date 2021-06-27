<?php

namespace App\Repositories\Support;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
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

    public function all(array $columns = ['*']): Collection
    {
        return $this->query->get($columns);
    }

    public function paginate(int $perPage = 15, ?array $columns = ['*']): Paginator
    {
        return $this->query->simplePaginate($perPage, $columns);
    }

    public function findById(int $id, array $columns = ['*']): Model
    {
        return $this->query->find($id, $columns);
    }

    public function findByColumn(string $column, $value, array $columns = ['*']): Model
    {
        return $this->query->where($column, '=', $value)->first($columns);
    }

    public function create(array $data): Model
    {
        return $this->query->create($data);
    }

    public function update(array $data, int $id, $attribute = 'id'): int
    {
        return $this->query->where($attribute, '=', $id)->update($data);
    }

    public function updateByColumn(array $data, string $column, $value, $operator): int
    {
        return $this->query->where($column, '=', $value)->update($data);
    }

    public function delete(int $id, $forceDelete = false): bool
    {
        if ($forceDelete){
            return $this->query->findOrFail($id)->forceDelete();
        }

        return !!$this->query->findOrFail($id)->delete();
    }

    public function deleteByColumn(string $column, $value): bool
    {
        return $this->query->where($column, '=', $value)->delete();
    }
}

