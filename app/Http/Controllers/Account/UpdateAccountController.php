<?php
namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\Account\AccountDTO;
use App\Services\Account\UpdateAccount\UpdateAccountService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateAccountController extends Controller
{
    private UpdateAccountService $service;

    public function __construct(UpdateAccountService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request, $id): JsonResponse
    {
        $productDTO = AccountDTO::fromRequest($request);

        return $this->respondWithData(UserResource::make($this->service->execute($id, $productDTO)));
    }
}
