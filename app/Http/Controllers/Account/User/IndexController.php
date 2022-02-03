<?php

namespace App\Http\Controllers\Account\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
//        $role = Role::create(['name' => 'Administrador']);
//        $permission = Permission::create(['name' => 'product.create']);
//
//        $role->givePermissionTo($permission);
        return UserResource::collection(User::paginate(10));
    }
}
