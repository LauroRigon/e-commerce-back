<?php

namespace App\Repositories\Contracts;

interface RepositoryFilterableInterface
{
    public function getFilters(): array;

    public function setQueries(array $queries);
}
