<?php

namespace App\Repositories\Filters;

use App\Repositories\Contracts\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

class QueryFilter implements FilterInterface
{
    private array $columns;

    public function __construct(array $columns)
    {
        $this->columns = $columns;
    }

    public function apply(Builder $builder, $value)
    {
        $builder->where(function(Builder $builder) use ($value) {
            foreach ($this->columns as $column) {
                $builder->orWhere($column, 'like', "%$value%");
            }
        });
    }
}
