<?php
namespace App\Services\Product\CreateProduct;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Services\Product\ProductDTO;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CreateProductService
{
    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws ValidationException
     */
    public function execute(ProductDTO $productDTO): Product
    {
        Validator::make($productDTO->toArray(), $this->getValidationRules())->validate();

        return $this->repository->create($productDTO->toArray());
    }

    private function getValidationRules(): array
    {
        return [
          'name' => ['required', 'max:255'],
          'description' => ['required'],
          'price' => ['required', 'numeric'],
          'discount' => ['between:0,100', 'numeric'],
          'stock' => ['integer'],
          'availability' => ['integer', Rule::in(array_keys(Product::AVAILABILITIES))],
          'image' => ['string'],
          'active' => ['boolean'],
          'user_id' => ['integer', 'exists:users,id'],
        ];
    }
}
