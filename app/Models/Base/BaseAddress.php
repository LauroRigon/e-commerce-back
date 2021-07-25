<?php

namespace App\Models\Base;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int    $id
 * @property int    $user_id
 * @property string $alias
 * @property string $cep
 * @property string $city
 * @property string $state
 * @property string $district
 * @property string $address
 * @property int    $number
 * @property string $complement
 * @property string $created_at
 * @property string $updated_at
 */
class BaseAddress extends Model
{
    protected $fillable = [
        'alias',
        'user_id',
        'cep',
        'city',
        'state',
        'district',
        'address',
        'number',
        'complement',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
