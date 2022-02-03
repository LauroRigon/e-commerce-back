<?php

namespace App\Http\Resources\Admin;

use App\Helpers\CalculationsHelper;
use App\Support\AppJsonResource;

class RoleResource extends AppJsonResource
{
    public function resource($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'permissions' => PermissionResource::collection($this->permissions),
        ];
    }
}
