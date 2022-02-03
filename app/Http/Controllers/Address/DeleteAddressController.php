<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Services\Address\AddressDTO;
use App\Services\Address\CreateAddress\UpdateAddressService;
use Illuminate\Http\Request;

class DeleteAddressController extends Controller
{
    private AddressRepositoryInterface $repository;

    public function __construct(AddressRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request, $id)
    {
        $this->repository->delete($id);

        return $this->respondWithSuccess();
    }
}
