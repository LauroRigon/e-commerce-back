<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function all(array $columns = ['*']): Collection;

    public function paginate(int $perPage, array $columns): Paginator;

    public function findById(int $id, array $columns): ?Model;

    public function findByColumn(string $column, $value, array $columns): ?Model;

    public function create(array $data): Model;

    public function update(int $id, array $data): Model;

    public function updateByColumn(array $data, string $column, $value, $operator): int;

    public function delete(int $id, bool $forceDelete = false): bool;

    public function deleteByColumn(string $column, $value): bool;
}
