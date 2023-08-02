<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
        	['name'	=> 'English', 	'code' => 'en'],
        	['name'	=> 'Franch', 	'code' => 'fr'],
        	['name'	=> 'Italy', 	'code' => 'it']
        ]);
    }
}
