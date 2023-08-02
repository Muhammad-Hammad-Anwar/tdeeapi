<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Language
 *
 * @property $id
 * @property $name
 * @property $code
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Language extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    static $rules = [
		'name' => 'required',
		'code' => 'required|unique:languages',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mainMenus()
    {
        return $this->hasMany(Menu::class, 'language_id', 'id')->where('type','Main')->whereNull('parent_id')->orderBy('order','asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function moreMenus()
    {
        return $this->hasMany(Menu::class, 'language_id', 'id')->where('type','More')->orderBy('order','asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function aboutMenus()
    {
        return $this->hasMany(Menu::class, 'language_id', 'id')->where('type','About')->orderBy('order','asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contactMenus()
    {
        return $this->hasMany(Menu::class, 'language_id', 'id')->where('type','Contact')->orderBy('order','asc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fourOfourMenus()
    {
        return $this->hasMany(Menu::class, 'language_id', 'id')->where('type','404')->orderBy('order','asc');
    }
}
