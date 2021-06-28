<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\Product\ListProducts\ListProductsService;
use Illuminate\Http\Request;

class ListProductsController extends Controller
{
    private ListProductsService $service;

    public function __construct(ListProductsService $service)
    {
        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $this->service->setQueries($request->query());

        return ProductResource::collection($this->service->actives());
    }
}
