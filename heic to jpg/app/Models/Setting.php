<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    static $rules = [
        'key' 		=> 'required',
        'value' 	=> 'required',
    ];

    protected $fillable = ['key', 'value'];

    static function get($key) {
    	return self::where('key', $key)->pluck('value')->first();
    }

    static function set($data) {
        return Setting::upsert( $data, ['key'], ['value']);
    }
}
