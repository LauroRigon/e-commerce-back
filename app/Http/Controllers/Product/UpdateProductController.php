<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\Product\ProductDTO;
use App\Services\Product\UpdateProduct\UpdateProductsService;
use Illuminate\Http\Request;

class UpdateProductController extends Controller
{
    private UpdateProductsService $service;

    private Request $request;

    public function __construct(UpdateProductsService $service, Request $request)
    {
        $this->service = $service;
        $this->request = $request;
    }

    public function __invoke($id)
    {
        $productDTO = ProductDTO::fromRequest($this->request);

        return ProductResource::make($this->service->execute($id, $productDTO));
    }
}
