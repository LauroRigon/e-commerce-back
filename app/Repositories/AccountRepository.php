<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\AccountRepositoryInterface;
use App\Repositories\Support\BaseRepository;

class AccountRepository extends BaseRepository implements AccountRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(app()->make(User::class));
    }
}
