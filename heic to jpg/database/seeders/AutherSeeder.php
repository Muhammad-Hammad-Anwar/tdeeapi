<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AutherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authers')->insert([
        	[
        		'name' 	    => 'Alen Walker',
        		'image'     => '/upload/images/auther/auther1.jpg',
        		'bio' 	    => 'I am Mathematician, Tech geek and a content writer. I love solving patterns of different math queries and write in a way that anyone can understand. Math and Technology has done its part and now its the time for us to get benefits from it.',
                'created_at'=> '2023-03-06 11:55:03',
                'updated_at'=> '2023-03-06 11:55:03',
        	]
        ]);
    }
}
