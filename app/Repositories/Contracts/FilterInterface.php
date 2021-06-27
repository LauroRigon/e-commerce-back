<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public function apply(Builder $builder, $value);
}
