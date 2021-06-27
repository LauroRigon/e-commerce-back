<?php

namespace App\Helpers;

class CalculationsHelper
{
    public static function applyDiscount(float $price, float $discountPercent): float
    {
        $discount = ($discountPercent / 100) * $price;
        return $price - $discount;
    }
}
