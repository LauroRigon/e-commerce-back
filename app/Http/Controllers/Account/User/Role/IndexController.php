<?php

namespace App\Http\Controllers\Account\User\Role;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\RoleResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class IndexController extends Controller
{
    public function __invoke(Request $request, User $user)
    {
        $role = Role::query()->first();
//
//        $role->givePermissionTo(Permission::query()->first());

        $user->assignRole($role);

        return RoleResource::collection($user->roles);
    }
}
