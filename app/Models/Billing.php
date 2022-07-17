<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * @property integer $id
 * @property float $price
 * @property float $reduction
 * @property string $created_at
 * @property string $updated_at
 */
class Billing extends Model
{
    use  Notifiable;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'billing';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['price', 'reduction', 'created_at', 'updated_at'];
}
