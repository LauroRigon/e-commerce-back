<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\RegisterService\RegisterFailException;
use App\Services\Auth\RegisterService\RegisterService;

class RegisterController extends Controller
{
    private RegisterService $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function __invoke(RegisterRequest $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $userAuthenticated = $this->registerService->execute($name, $email, $password);
        } catch (RegisterFailException $e) {
            return $this->respondWithErrorException($e);
        }

        return $this->respondWithSuccessfullyCreated($userAuthenticated, 'Registrado com sucesso!');
    }
}
