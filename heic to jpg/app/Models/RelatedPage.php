<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RelatedPage
 *
 * @property $id
 * @property $page_id
 * @property $parent_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Page $page
 * @property Page $page
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RelatedPage extends Model
{
    
    static $rules = [
		'page_id' => 'required',
		'parent_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['page_id','parent_id'];


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
        return $this->hasOne('App\Models\Page', 'id', 'parent_id');
    }
}
