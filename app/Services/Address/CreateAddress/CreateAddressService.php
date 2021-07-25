<?php

namespace App\Services\Address\CreateAddress;

use App\Models\Address;
use App\Models\Product;
use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Services\Address\AddressDTO;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateAddressService
{
    private AddressRepositoryInterface $repository;

    public function __construct(AddressRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws ValidationException
     */
    public function execute(int $userId, AddressDTO $addressDTO): Address
    {
        $addressDTO->setUser($userId);

        Validator::make($addressDTO->toArray(), $this->getValidationRules())->validate();

        return $this->repository->create($addressDTO->toArray());
    }

    private function getValidationRules(): array
    {
        return [
            'alias' => ['required', 'string'],
            'cep' => ['required', 'string', 'size:8'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'address' => ['required', 'string'],
            'number' => ['integer'],
            'user_id' => ['integer', 'exists:users,id'],
        ];
    }
}
