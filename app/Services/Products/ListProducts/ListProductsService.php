<?php
namespace App\Services\Products\ListProducts;

use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Contracts\Pagination\Paginator;

class ListProductsService
{
    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function actives(): Paginator
    {
        return $this->repository->getActives(2);
    }
}
