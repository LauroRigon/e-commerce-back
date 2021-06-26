<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\Products\ListProducts\ListProductsService;
use Illuminate\Http\JsonResponse;

class ListProductsController extends Controller
{
    private ListProductsService $service;

    public function __construct(ListProductsService $service)
    {
        $this->service = $service;
    }

    public function __invoke()
    {
        return ProductResource::collection($this->service->actives());
    }
}
