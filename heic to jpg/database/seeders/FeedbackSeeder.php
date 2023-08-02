<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('feedbacks')->insert([
        	[
                'name' => 'User',
        		'email' => 'user@gmail.com',
        		'message' 	=> 'Your Site is really helpful',
        	]
        ]);
    }
}