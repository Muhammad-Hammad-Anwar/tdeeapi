<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class APITokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	DB::table('api_tokens')->insert([
        	[
        		'code' 	    => 'L32UK4-9K8Y7VKX2J',
        		'limit'     => 20000,
                'created_at'=> '2023-03-06 11:55:03',
                'updated_at'=> '2023-03-06 11:55:03',
        	],
        	[
        		'code' 	    => 'PLLPQL-G46496KKWR',
        		'limit'     => 20000,
                'created_at'=> '2023-03-06 11:55:03',
                'updated_at'=> '2023-03-06 11:55:03',
        	],
        	[
        		'code' 	    => 'GPH338-5W6X2AGTY9',
        		'limit'     => 20000,
                'created_at'=> '2023-03-06 11:55:03',
                'updated_at'=> '2023-03-06 11:55:03',
        	],
        	[
        		'code' 	    => 'QX6E5E-E64TVR6UGX',
        		'limit'     => 20000,
                'created_at'=> '2023-03-06 11:55:03',
                'updated_at'=> '2023-03-06 11:55:03',
        	],
        	[
        		'code' 	    => '5XQQTH-32VQGKJUPR',
        		'limit'     => 20000,
                'created_at'=> '2023-03-06 11:55:03',
                'updated_at'=> '2023-03-06 11:55:03',
        	],
        ]);   
    }
}
