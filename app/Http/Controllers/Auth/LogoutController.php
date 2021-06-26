<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Services\Auth\Exceptions\LoginFailException;
use App\Services\Auth\Login\LoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $user->tokens()->where('name', 'auth')->delete();

        return $this->respondWithSuccess('Logout realizado!');
    }
}
