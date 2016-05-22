<?php

use Illuminate\Database\Seeder;

class ResponsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('responses')->insert([
            [ "survey_id" => 1, "survey_question_id" => 1, "answer_id" => 1, ],
            [ "survey_id" => 1, "survey_question_id" => 1, "answer_id" => 2, ],
            [ "survey_id" => 1, "survey_question_id" => 1, "answer_id" => 2, ],
            [ "survey_id" => 1, "survey_question_id" => 1, "answer_id" => 2, ],
    ]);
    }
}
