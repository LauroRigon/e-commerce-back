<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\Auth\Login\LoginFailException;
use App\Services\Auth\Login\LoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetUserAuthenticatedController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $user = $request->user();

        return $this->respondWithData(UserResource::make($user));
    }
}
