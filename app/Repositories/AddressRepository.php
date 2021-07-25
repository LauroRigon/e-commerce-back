<?php

namespace App\Repositories;

use App\Models\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Repositories\Support\BaseRepository;
use App\Repositories\Traits\RepositoryFilterableTrait;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    use RepositoryFilterableTrait;

    public function __construct()
    {
        parent::__construct(app()->make(Address::class));
    }

    public function getFilters(): array
    {
        return [
//            'search' => new QueryFilter(['name', 'description']),
        ];
    }
}
