<?php

namespace App\Services\Account;

use App\Support\DataTransferObject;
use Illuminate\Http\Request;

class AccountDTO extends DataTransferObject
{
    /** @var string */
    public $name;

    /** @var string */
    public $email;

    /** @var string */
    public $cpf;

    /** @var string */
    public $phone;

    public static function fromRequest(Request $request): self
    {
        return new self($request->only(
            'name',
            'cpf',
            'phone',
        ));
    }
}
