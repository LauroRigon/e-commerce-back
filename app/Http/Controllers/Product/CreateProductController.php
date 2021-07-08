<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\Product\CreateProduct\CreateProductService;
use App\Services\Product\ProductDTO;
use Illuminate\Http\Request;

class CreateProductController extends Controller
{
    private CreateProductService $service;

    public function __construct(CreateProductService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $productDTO = ProductDTO::fromRequest($request);

        return ProductResource::make($this->service->execute($productDTO));
    }
}
