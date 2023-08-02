<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
        	['language_id' => '1','type' => 'Main','parent_id' => NULL,'title' => 'Home','url' => '/','order' => '1'],
        	['language_id' => '1','type' => 'Main','parent_id' => NULL,'title' => 'Blog','url' => 'blogs','order' => '3',],
        	['language_id' => '1','type' => 'More','parent_id' => NULL,'title' => 'Blogs','url' => 'blogs','order' => '1',],
        	['language_id' => '1','type' => 'More','parent_id' => NULL,'title' => 'Privacy Policy','url' => 'privacy-policy','order' => '2',],
            ['language_id' => '1','type' => 'More','parent_id' => NULL,'title' => 'Terms & Conditions','url' => 'terms-and-conditions','order' => '3'],
            ['language_id' => '1','type' => 'More','parent_id' => NULL,'title' => 'About Us','url' => 'about-us','order' => '4'],
            ['language_id' => '1','type' => 'Contact','parent_id' => NULL,'title' => 'Plagiarism Checker','url' => 'plagiarism-checker','order' => '1'],
            ['language_id' => '1','type' => 'Contact','parent_id' => NULL,'title' => 'Grammer Checker','url' => 'grammer-checker','order' => '2'],
        ]);
    }
}
