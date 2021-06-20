<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService\LoginFailException;
use App\Services\Auth\LoginService\LoginService;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    private LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function __invoke(LoginRequest $request): JsonResponse
    {
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $userAuthenticated = $this->loginService->execute($email, $password);
        } catch (LoginFailException $e) {
            return $this->respondWithErrorException($e);
        }

        return $this->respondWithData($userAuthenticated);
    }
}
