<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Quiz
 *
 * @property $id
 * @property $topic_id
 * @property $title
 * @property $created_at
 * @property $updated_at
 *
 * @property Topic $topic
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Quiz extends Model
{
    
    static $rules = [
		'topic_id' => 'required',
		'title' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['topic_id','title'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function topic()
    {
        return $this->hasOne('App\Models\Topic', 'id', 'topic_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'quiz_id','id');
    }
}
