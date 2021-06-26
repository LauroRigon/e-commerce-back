<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Support\BaseRepository;
use Illuminate\Contracts\Pagination\Paginator;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(app()->make(Product::class));
    }

    public function getActives($paginate = 20): Paginator
    {
        $this->query->where('active', true);

        return $this->paginate($paginate);
    }
}
