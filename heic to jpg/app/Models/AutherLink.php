<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class AutherLink
 *
 * @property $id
 * @property $auther_id
 * @property $type
 * @property $link
 * @property $created_at
 * @property $updated_at
 *
 * @property Auther $auther
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AutherLink extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    static $rules = [
		'auther_id' => 'required',
		'type'      => 'required',
		'link'      => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['auther_id','type','link'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function auther()
    {
        return $this->hasOne('App\Models\Auther', 'id', 'auther_id');
    }
}
