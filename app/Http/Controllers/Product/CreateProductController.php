<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\Product\ListProducts\ListProductsService;

class CreateProductController extends Controller
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
