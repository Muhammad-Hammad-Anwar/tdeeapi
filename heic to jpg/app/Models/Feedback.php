<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Feedback
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $message
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Feedback extends Model implements Auditable
{   
    use \OwenIt\Auditing\Auditable;
    
    protected $table= ('feedbacks');

    static $rules = [
		'name' => 'required',
		'email' => 'required',
		'message' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email','message'];
}
