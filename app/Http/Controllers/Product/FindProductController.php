<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\Product\ListProducts\ListProductsService;
use Illuminate\Http\Request;
use App\Models\Product;

class FindProductController extends Controller
{
    // private ListProductsService $service;

    // public function __construct(ListProductsService $service)
    // {
        // $this->service = $service;
    // }

    public function __invoke(Product $id)
    {
        return ProductResource::make($id);
    }
}
