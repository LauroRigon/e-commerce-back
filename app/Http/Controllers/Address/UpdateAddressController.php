<?php

namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Services\Address\AddressDTO;
use App\Services\Address\CreateAddress\UpdateAddressService;
use Illuminate\Http\Request;

class UpdateAddressController extends Controller
{
    private UpdateAddressService $service;

    public function __construct(UpdateAddressService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request, $id)
    {
        $addressDTO = AddressDTO::fromRequest($request);

        return AddressResource::make($this->service->execute($id, $addressDTO));
    }
}
