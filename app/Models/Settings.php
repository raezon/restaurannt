<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $owner_name
 * @property string $email
 * @property string $phone
 * @property string $location
 * @property string $store_phone
 * @property string $store_email
 * @property string $options
 * @property string $created_at
 * @property string $updated_at
 */
class Settings extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'setttings';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'owner_name', 'email', 'phone', 'location', 'store_phone', 'store_email', 'options', 'created_at', 'updated_at'];
}
