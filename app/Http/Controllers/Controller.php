<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function respondWithErrorException(\Exception $e): JsonResponse
    {
        return response()->json([
            'message' => $e->getMessage(),
        ],  $e->getCode());
    }

    protected function respondWithSuccessfullyCreated($data = null, string $message = 'Criado com sucesso!'): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ],  Response::HTTP_CREATED);
    }

    protected function respondWithSuccess($message = ''): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ],  Response::HTTP_OK);
    }

    protected function respondWithData($data): JsonResponse
    {
        return response()->json([
            'data' => $data,
        ],  Response::HTTP_OK);
    }
}
