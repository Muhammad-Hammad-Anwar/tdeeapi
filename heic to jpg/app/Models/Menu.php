<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Menu
 *
 * @property $id
 * @property $type
 * @property $title
 * @property $url
 * @property $order
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Menu extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    static $rules = [
		'type' => 'required',
		'title' => 'required',
		'url' => 'required',
		'order' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['type','language_id','parent_id','title','url','order'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function language()
    {
        return $this->hasOne('App\Models\Language', 'id', 'language_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childItems() {
        return $this->hasMany(Menu::class, 'parent_id','id');
    }
}
