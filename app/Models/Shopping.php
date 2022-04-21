<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property float $price
 * @property string $created_at
 * @property string $updated_at
 */
class Shopping extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'shopping';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'price', 'created_at', 'updated_at'];
}
