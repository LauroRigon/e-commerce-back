<?php
namespace App\Services\Product\ListProducts;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class ListProductsService
{
    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function actives($paginate = 10): Paginator
    {
        return $this->repository
            ->actives()
            ->paginate($paginate);
    }

    public function setQueries(?array $queries)
    {
        if (!$queries) return;

        $this->repository->setQueries($queries);
    }
}
