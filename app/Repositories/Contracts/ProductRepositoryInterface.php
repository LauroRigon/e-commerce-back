<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\Paginator;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function getActives(): Paginator;
}
