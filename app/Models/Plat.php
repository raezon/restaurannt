<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 */
class Plat extends Model
{

    public function ingrediants()
    {
        return $this->belongsToMany(Ingrediant::class);
    }
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'plats';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'price', 'image', 'created_at', 'updated_at'];
}
