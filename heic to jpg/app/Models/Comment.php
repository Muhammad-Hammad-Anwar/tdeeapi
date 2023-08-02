<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Comment
 *
 * @property $id
 * @property $page_id
 * @property $parent_id
 * @property $name
 * @property $email
 * @property $message
 * @property $created_at
 * @property $updated_at
 *
 * @property Page $page
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Comment extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    static $rules = [
		'page_id' => 'required',
		'name'    => 'required',
		'email'   => 'required',
		'message' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['page_id','parent_id','name','email','message','read_at','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function page()
    {
        return $this->hasOne('App\Models\Page', 'id', 'page_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        return $this->hasOne('App\Models\Comment', 'id', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function replyComments()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id', 'id');
    }
}
