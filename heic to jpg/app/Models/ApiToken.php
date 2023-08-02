<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ApiToken
 *
 * @property $id
 * @property $code
 * @property $limit
 * @property $utilize
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ApiToken extends Model
{
    
    static $rules = [
		'code' => 'required',
		'limit' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['code','limit','web_utilize','app_utilize'];
}
