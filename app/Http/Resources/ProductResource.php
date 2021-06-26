<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        $withs = explode(',', $request->query('with'));

        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'description'  => $this->description,
            'discount'     => $this->discount,
            'stock'        => $this->stock,
            'availability' => $this->availability,
            'image'        => $this->image,
            'user'         => $this->when(in_array('user', $withs), fn () => new UserResource($this->user)),
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
        ];
    }
}
