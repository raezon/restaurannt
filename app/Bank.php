<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bank
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $price
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bank extends Model
{
    
    static $rules = [
		'name' => 'required',
		'description' => 'required',
		'price' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','price'];



}
