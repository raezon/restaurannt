<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property string $picture
 * @property string $sku
 * @property float $price
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Food[] $foods
 * @property Order[] $orders
 * @property PacksProduct[] $packsProducts
 * @property Plat[] $plats
 * @property ProductCategory[] $productCategories
 * @property ProductStock[] $productStocks
 */
class Product extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'type', 'picture', 'sku', 'price', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foods()
    {
        return $this->hasMany('App\Model\Food');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Model\Order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packsProducts()
    {
        return $this->hasMany('App\Model\PacksProduct');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plats()
    {
        return $this->hasMany('App\Model\Plat');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productCategories()
    {
        return $this->hasMany('App\Model\ProductCategory');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productStocks()
    {
        return $this->hasMany('App\Model\ProductStock');
    }
}
