<?php

namespace App\Http\Resources;

use App\Helpers\CalculationsHelper;
use App\Support\AppJsonResource;

class ProductResource extends AppJsonResource
{
    public array $availableIncludes = [];

    public array $defaultIncludes = ['user'];

    public function resource($request): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'description'    => $this->description,
            'original_price' => $this->price,
            'price'          => CalculationsHelper::applyDiscount($this->price, $this->discount ?: 0),
            'discount'       => $this->discount,
            'stock'          => $this->stock,
            'availability'   => $this->availability,
            'image'          => $this->image,
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
        ];
    }

    public function includeUser($request)
    {
        return new UserResource($this->user);
    }
}
