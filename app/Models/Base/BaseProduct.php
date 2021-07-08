<?php

namespace App\Models\Base;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int    $id
 * @property string $name
 * @property string $description
 * @property float  $price
 * @property float  $discount
 * @property int    $stock
 * @property int    $availability
 * @property string $image
 * @property bool   $active
 * @property string $created_at
 * @property string $updated_at
 */
class BaseProduct extends Model
{
    public const AVAILABILITY_IN_STOCK = 1;
    public const AVAILABILITY_OUT_STOCK = 2;
    public const AVAILABILITY_PRE_ORDER = 3;

    public const AVAILABILITIES = [
        self::AVAILABILITY_IN_STOCK => "Em estoque",
        self::AVAILABILITY_OUT_STOCK => "Sem estoque",
        self::AVAILABILITY_PRE_ORDER => "Pré compra",
    ];

    protected $fillable = [
        'name',
        'description',
        'discount',
        'price',
        'stock',
        'availability',
        'image',
        'active',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
