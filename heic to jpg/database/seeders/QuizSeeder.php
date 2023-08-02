<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('quizzes')->insert([
            [
                'topic_id' => '1',
                'title' => 'Quiz Number 1',
            ],
            [
                'topic_id' => '1',
                'title' => 'Quiz Number 2',
            ],
            [
                'topic_id' => '1',
                'title' => 'Quiz Number 3',
            ],
            [
                'topic_id' => '1',
                'title' => 'Quiz Number 4',
            ],
            [
                'topic_id' => '1',
                'title' => 'Quiz Number 5',
            ],
            [
                'topic_id' => '1',
                'title' => 'Quiz Number 6',
            ],
            [
                'topic_id' => '1',
                'title' => 'Quiz Number 7',
            ],

        ]);
    }
}
