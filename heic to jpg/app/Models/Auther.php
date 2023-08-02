<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Image;

/**
 * Class Auther
 *
 * @property $id
 * @property $name
 * @property $image
 * @property $bio
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Auther extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    static $rules = [
		'name'    => 'required',
		'bio'     => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','image','bio'];

    public function setImageAttribute($image)
    {
        if ($image) {
            $filenamewithextension = $image->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $filenametostore = 'upload/images/auther/'.time().'.webp';
            $img = Image::make($image)->encode('webp', 90)->resize(130, 130);   
            $img->save(public_path($filenametostore));
            $this->attributes['image'] = $filenametostore;
        }else{
            unset($this->attributes['image']);
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function socialLinks()
    {
        return $this->hasMany(AutherLink::class);
    }
}
