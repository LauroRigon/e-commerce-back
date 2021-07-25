<?php

namespace App\Services\Address\CreateAddress;

use App\Models\Address;
use App\Repositories\Contracts\AddressRepositoryInterface;
use App\Services\Address\AddressDTO;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UpdateAddressService
{
    private AddressRepositoryInterface $repository;

    public function __construct(AddressRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws ValidationException
     */
    public function execute(int $id, AddressDTO $addressDTO): Address
    {
        Validator::make($addressDTO->toArray(), $this->getValidationRules())->validate();

        return $this->repository->update($id, $addressDTO->toArray());
    }

    private function getValidationRules(): array
    {
        return [
            'alias' => ['sometimes', 'required', 'string'],
            'cep' => ['sometimes', 'required', 'string', 'size:8'],
            'city' => ['sometimes', 'required', 'string'],
            'state' => ['sometimes', 'required', 'string'],
            'address' => ['sometimes', 'required', 'string'],
            'number' => ['sometimes', 'integer'],
            'user_id' => ['sometimes', 'integer', 'exists:users,id'],
        ];
    }
}
