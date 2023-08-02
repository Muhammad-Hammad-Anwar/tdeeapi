<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tools')->insert([
        	[
				'title'       => 'Main tool',
				'blade'       => 'main_tool',
				'examples'	  =>  NULL,
				'created_at'  => '2023-06-22 19:43:43',
				'updated_at'  => '2023-06-22 19:43:43'
		  	],
        ]);
    }
}
