<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function all($columns = ['*']): Collection;

    public function paginate($perPage, $columns): LengthAwarePaginator;

    public function findById($id, $columns): ?Model;

    public function findByColumn($column, $value, $columns): ?Model;

    public function create(array $data): Model;

    public function update(array $data, $id): int;

    public function updateByColumn(array $data, $column, $value, $operator): int;

    public function delete($id, $forceDelete = false): bool;

    public function deleteByColumn($column, $value): bool;
}
