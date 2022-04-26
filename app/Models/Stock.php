<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property int $quantity
 * @property string $created_at
 * @property string $updated_at
 */
class Stock extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'stock';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'quantity', 'created_at', 'updated_at'];
}
