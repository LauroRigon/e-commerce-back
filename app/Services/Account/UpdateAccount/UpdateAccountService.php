<?php
namespace App\Services\Account\UpdateAccount;

use App\Http\Resources\UserResource;
use App\Models\Product;
use App\Models\User;
use App\Repositories\Contracts\AccountRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Services\Account\AccountDTO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UpdateAccountService
{
    private AccountRepositoryInterface $repository;

    public function __construct(AccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id, AccountDTO $accountDTO)
    {
        Validator::make($accountDTO->toArray(), $this->getValidationRules())->validate();

        $this->repository->update($id, $accountDTO->toArray());
    }

    private function getValidationRules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'max:255'],
            'email' => ['sometimes', 'required', 'email'],
            'cpf' => ['sometimes', 'required', 'size:11'],
            'phone' => ['sometimes', 'required', 'size:11'],
        ];
    }
}
