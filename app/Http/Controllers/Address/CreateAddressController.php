<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Services\Address\AddressDTO;
use App\Services\Address\CreateAddress\CreateAddressService;
use Illuminate\Http\Request;

class CreateAddressController extends Controller
{
    private CreateAddressService $service;

    public function __construct(CreateAddressService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $addressDTO = AddressDTO::fromRequest($request);

        return AddressResource::make($this->service->execute($request->user()->id, $addressDTO));
    }
}
