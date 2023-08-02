<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JobApplication
 *
 * @property $id
 * @property $career_id
 * @property $name
 * @property $email
 * @property $attachment
 * @property $created_at
 * @property $updated_at
 *
 * @property Career $career
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobApplication extends Model
{
    
    static $rules = [
		'career_id'  => 'required',
		'name'       => 'required',
		'email'      => 'required',
		'attachment' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['career_id','name','email','attachment'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function career()
    {
        return $this->hasOne('App\Models\Career', 'id', 'career_id');
    }
    
    public function setAttachmentAttribute($attachment)
    {
        if ($attachment) {
            $name = $attachment->getClientOriginalName();
            $attachment->move('upload/document/application/', $name); 
            $this->attributes['attachment'] = $name;
        }else{
            unset($this->attributes['attachment']);
        }
    }
}
