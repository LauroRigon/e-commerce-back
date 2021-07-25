<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Repositories\Contracts\AddressRepositoryInterface;
use Illuminate\Http\Request;

class ListAdressesController extends Controller
{
    private AddressRepositoryInterface $repository;

    public function __construct(AddressRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $this->repository->setQueries($request->query());

        return AddressResource::collection($this->repository->paginate(10));
    }
}
