<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string $photo
 * @property PackPlatFood[] $packPlatFoods
 * @property PacksProduct[] $packsProducts
 */
class Pack extends Model
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
    protected $fillable = ['name', 'created_at', 'updated_at', 'photo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packPlatFoods()
    {
        return $this->hasMany('App\PackPlatFood');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packsProducts()
    {
        return $this->hasMany('App\PacksProduct');
    }
}
