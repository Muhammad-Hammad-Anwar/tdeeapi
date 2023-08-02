<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 *
 * @property $id
 * @property $quiz_id
 * @property $title
 * @property $options
 * @property $answer
 * @property $hint
 * @property $created_at
 * @property $updated_at
 *
 * @property Quiz $quiz
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Question extends Model
{
    
    static $rules = [
		'quiz_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['quiz_id','title','options','answer','hint'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function quiz()
    {
        return $this->hasOne('App\Models\Quiz', 'id', 'quiz_id');
    }
    
     /**
     * Set the option's.
     *
     * @param  string $value
     * @return void
     */
    // public function setOptionsAttribute($values) {
    //     if($values) {
    //        $this->attributes['options'] = json_encode($values);
    //     }else{
    //         unset($this->attributes['options']);
    //     }
    // }

     /**
     * Get the option's.
     *
     * @param  string $value
     * @return void
     */
    public function getOptionsAttribute($values){
        $options = array();
        if ($values) {
            foreach (explode(',',$values) as $option) {
                $options[] = $option;
            }
        }
        return $options;
    }
}
