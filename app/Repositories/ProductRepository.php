<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Filters\QueryFilter;
use App\Repositories\Support\BaseRepository;
use App\Repositories\Traits\RepositoryFilterableTrait;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    use RepositoryFilterableTrait;

    public function __construct()
    {
        parent::__construct(app()->make(Product::class));
    }

    public function getFilters(): array
    {
        return [
            'search' => new QueryFilter(['name', 'description']),
        ];
    }

    public function actives(): self
    {
        $this->query->where('active', true);

        return $this;
    }
}
