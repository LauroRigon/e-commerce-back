<?php
namespace App\Services\Auth\Login;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function execute(string $email, string $password)
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            throw new LoginFailException('Email ou senha incorretos');
        }

        /** @var User $user */
        $user = Auth::user();
        return [
            'user' => new UserResource($user),
            'token' => $user->createToken('auth')->plainTextToken,
        ];
    }
}
