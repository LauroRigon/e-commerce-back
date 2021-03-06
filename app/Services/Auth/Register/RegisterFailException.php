<?php
namespace App\Services\Auth\Register;

use Illuminate\Http\Response;

class RegisterFailException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
