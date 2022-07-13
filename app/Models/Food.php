<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_id
 * @property string $name
 * @property string $picture
 * @property string $created_at
 * @property string $updated_at
 * @property float $price
 * @property string $photo
 * @property Product $product
 * @property PackPlatFood[] $packPlatFoods
 */
class Food extends Model
{

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'foods';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'name', 'picture', 'price'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packPlatFoods()
    {
        return $this->hasMany('App\PackPlatFood');
    }
}
