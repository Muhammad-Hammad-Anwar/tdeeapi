<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('galleries')->insert([
        	[
        		'image' => 'upload/images/gallery/image.jpg',
        		'title' => 'User Image',
        	]
        ]);
    }
}
