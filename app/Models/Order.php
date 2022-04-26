<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $pack_id
 * @property integer $plat_id
 * @property integer $food_id
 * @property string $created_at
 * @property string $updated_at
 * @property Pack $pack
 * @property Food $food
 * @property Plat $plat
 */
class Order extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'orders';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['pack_id', 'plat_id', 'food_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pack()
    {
        return $this->belongsToMany(Pack::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function food()
    {
        return $this->belongsToMany(Food::class);
    }


    public function plat()
    {
        return $this->belongsToMany(Plat::class);
        
    }
}
