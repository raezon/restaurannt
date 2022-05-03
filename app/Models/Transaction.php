<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $order_id
 * @property string $created_at
 * @property string $updated_at
 * @property Order $order
 */
class Transaction extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'transaciton';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['order_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
