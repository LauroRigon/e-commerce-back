<?php
namespace App\Services\Product\UpdateProduct;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Services\Product\ProductDTO;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UpdateProductsService
{
    private ProductRepositoryInterface $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws ValidationException
     */
    public function execute(int $id, ProductDTO $productDTO): Product
    {
        Validator::make($productDTO->toArray(), $this->getValidationRules())->validate();

        return $this->repository->update($id, $productDTO->toArray());
    }

    private function getValidationRules(): array
    {
        return [
          'name' => ['sometimes', 'required', 'max:255'],
          'description' => ['sometimes', 'required'],
          'price' => ['sometimes', 'required', 'numeric'],
          'discount' => ['sometimes', 'between:0,100', 'numeric'],
          'stock' => ['sometimes', 'integer'],
          'availability' => ['sometimes', 'integer', Rule::in(array_keys(Product::AVAILABILITIES))],
          'image' => ['sometimes', 'string'],
          'active' => ['sometimes', 'boolean'],
          'user_id' => ['sometimes', 'integer', 'exists:users,id'],
        ];
    }
}
