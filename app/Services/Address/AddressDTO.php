<?php

namespace App\Services\Address;

use App\Support\DataTransferObject;
use Illuminate\Http\Request;

class AddressDTO extends DataTransferObject
{
    /** @var int */
    public $id;

    /** @var int */
    public $user_id;

    /** @var string */
    public $alias;

    /** @var string */
    public $cep;

    /** @var string */
    public $city;

    /** @var string */
    public $state;

    /** @var string */
    public $address;

    /** @var string */
    public $district;

    /** @var int */
    public $number;

    /** @var string */
    public $complement;

    /** @var string */
    public $created_at;

    /** @var string */
    public $updated_at;

    public static function fromRequest(Request $request): self
    {
        return new self($request->only(
            'alias',
            'cep',
            'city',
            'state',
            'district',
            'address',
            'number',
            'complement',
        ));
    }

    public function setUser($userId)
    {
        $this->user_id = $userId;
    }

    public function setCep($cep)
    {
        $this->cep = preg_replace('/[^a-z0-9]/i', '', $cep);
    }
}
