<?php

namespace App\Http\Resources;

use App\Helpers\CalculationsHelper;
use App\Support\AppJsonResource;

class AddressResource extends AppJsonResource
{
    public array $availableIncludes = [];

    public function resource($request): array
    {
        return [
            'id'         => $this->id,
            'alias'      => $this->alias,
            'cep'        => $this->cep,
            'city'       => $this->city,
            'state'      => $this->state,
            'district'    => $this->district,
            'address'    => $this->address,
            'number'     => $this->number,
            'complement' => $this->complement,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public function includeUser($request)
    {
        return new UserResource($this->user);
    }
}
