<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Topic
 *
 * @property $id
 * @property $title
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Topic extends Model
{
    
    static $rules = [
		'title' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function quizez()
    {
        return $this->hasMany('App\Models\Quiz', 'topic_id','id');
    }
}
