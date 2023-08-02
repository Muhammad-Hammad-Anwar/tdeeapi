<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Image;

/**
 * Class Page
 *
 * @property $id
 * @property $auther_id
 * @property $title
 * @property $slug
 * @property $metaTitle
 * @property $metaDescription
 * @property $status
 * @property $content
 * @property $published_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Auther $auther
 * @property PageOpenGraph[] $pageOpenGraphs
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Page extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    static $rules = [
		'auther_id'   => 'required',
		'title'       => 'required',
		'slug'        => 'required',
		'status'      => 'required',
		'content'     => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'parent_id',
        'tool_id',
        'template',
        'category_type',
        'title',
        'slug',
        'image',
        'canonical',
        'metaTitle',
        'metaDescription',
        'og_tags',
        'schemas',
        'description',
        'content',
        'status',
        'auther_id',
        'published_by',
        'created_by',
        'published_at',
    ];

    // public function setImageAttribute($image)
    // {
    //     if ($image) {
    //         $filenamewithextension = $image->getClientOriginalName();
    //         $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
    //         $filenametostore = 'upload/images/pages/'.time().'.webp';
    //         $img = Image::make($image)->encode('webp', 90);   
    //         $img->save(public_path($filenametostore));
    //         $this->attributes['image'] = $filenametostore;
    //     }else{
    //         unset($this->attributes['image']);
    //     }
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parent()
    {
        return $this->hasOne(Page::class, 'id', 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function childs()
    {
        return $this->hasMany(Page::class, 'parent_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function relatedPages()
    {
        return $this->hasMany(RelatedPage::class, 'page_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'page_id', 'id')->whereNull('parent_id')->where('status','Publish');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function auther()
    {
        return $this->hasOne('App\Models\Auther', 'id', 'auther_id');
    }
    
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
    public function tool()
    {
        return $this->hasOne('App\Models\Tool', 'id', 'tool_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdBy()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function publishedBy()
    {
        return $this->hasOne('App\Models\User', 'id', 'published_by');
    }
}
