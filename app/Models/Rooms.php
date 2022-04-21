<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 */
class Rooms extends Model
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
    protected $fillable = ['name', 'type', 'created_at', 'updated_at'];
}
