<?php
namespace App\Services\Auth\Login;

use Illuminate\Http\Response;

class LoginFailException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message, Response::HTTP_UNAUTHORIZED);
    }
}
