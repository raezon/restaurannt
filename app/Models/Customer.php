<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $fullName
 * @property string $email
 * @property string $password
 * @property string $addresse
 * @property string $phone_number
 * @property string $user_id
 * @property string $created_at
 * @property string $updated_at
 */
class Customer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['fullName', 'email', 'password', 'addresse', 'phone_number', 'user_id', 'created_at', 'updated_at'];
}
