<?php

namespace App\Repositories\Contracts;

use App\Repositories\Traits\RepositoryFilterableTrait;

interface ProductRepositoryInterface extends BaseRepositoryInterface, RepositoryFilterableInterface
{
    public function actives(): self;
}
