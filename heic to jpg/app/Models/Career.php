<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Career
 *
 * @property $id
 * @property $title
 * @property $type
 * @property $description
 * @property $detail
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Career extends Model
{
    
    static $rules = [
		'title' => 'required',
		'type' => 'required',
		'description' => 'required',
		'detail' => 'required',
		'status' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','type','description','detail','status','order'];



}
