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
 * @property string $apear_phone
 * @property string $apear_email
 * @property string $option
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
    protected $table = 'parameter';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'owner_name', 'email', 'phone', 'location', 'apear_phone', 'apear_email', 'option', 'created_at', 'updated_at'];
}
