<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string $description
 * @property float $price
 * @property string $photo
 */
class Room extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'room';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'created_at', 'updated_at', 'description', 'price', 'photo'];
}
