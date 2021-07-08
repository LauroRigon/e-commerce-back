<?php

namespace App\Services\Product;

use App\Support\DataTransferObject;
use Illuminate\Http\Request;

class ProductDTO extends DataTransferObject
{
    /** @var string */
    public $name;

    /** @var string */
    public $description;

    /** @var float */
    public $price;

    /** @var float */
    public $discount;

    /** @var int */
    public $stock;

    /** @var int */
    public $availability;

    /** @var string */
    public $image;

    /** @var bool */
    public $active;

    /** @var int */
    public $user_id;


    public static function fromRequest(Request $request): self
    {
        return new self($request->only(
            'name',
            'description',
            'price',
            'discount',
            'stock',
            'availability',
            'image',
            'active',
            'user_id',
        ));
    }
}
