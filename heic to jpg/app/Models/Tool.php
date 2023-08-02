<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tool
 *
 * @property $id
 * @property $title
 * @property $blade
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tool extends Model
{
    
    static $rules = [
		'title' => 'required',
		'blade' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','blade','examples'];

    /**
     * Interact with the blade
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function getExamplesAttribute($value)
    {
        $examples = array();
        if ($value) {
            foreach (explode(',',$value) as $example) {
                $examples[] = $example;
            }
        }
        return $examples;
    }
}
