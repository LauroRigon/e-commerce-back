<?php

namespace App\Repositories\Traits;

use App\Repositories\Contracts\FilterInterface;

trait RepositoryFilterableTrait
{
    private array $queries = [];

    public function applyFilters()
    {
        $filtersToApply = array_intersect_key($this->getFilters(), $this->queries);
//        dd($filtersToApply);
        foreach ($filtersToApply as $query => $filter) {
            $filter->apply($this->query, $this->queries[$query]);
        }
    }

    public function setFilter(string $name, FilterInterface $filter): void
    {
        $this->filters[$name] = $filter;
    }

    abstract public function getFilters(): array;

    public function setQueries(array $queries)
    {
        $this->queries = $queries;

        $this->applyFilters();
    }
}
