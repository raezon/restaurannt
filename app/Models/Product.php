<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property int $picture
 * @property string $sku
 * @property float $price
 * @property string $created_at
 * @property string $updated_at
 * @property string $category
 * @property Food[] $foods
 * @property Order[] $orders
 * @property PacksProduct[] $packsProducts
 * @property Plat[] $plats
 */
class Product extends Model
{
    use SoftDeletes;
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'type', 'picture', 'sku', 'price', 'created_at', 'updated_at', 'category'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foods()
    {
        return $this->hasMany('App\Models\Food');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packsProducts()
    {
        return $this->hasMany('App\Models\PacksProduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plats()
    {
        return $this->hasMany('App\Models\Plat');
    }

    public function stocks()
    {
        return $this->belongsToMany(Stock::class);
    }
}
