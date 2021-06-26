<?php
namespace App\Services\Auth\Register;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function execute(string $name, string $email, string $password): array
    {
        $user = new User();
        $user->fill([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        if (!$user->save()) {
            throw new RegisterFailException('Falha ao registrar!');
        }

        return [
            'user' => new UserResource($user),
            'token' => $user->createToken('auth'),
        ];
    }
}
