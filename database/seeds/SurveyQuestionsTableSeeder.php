<?php

use Illuminate\Database\Seeder;

class SurveyQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_questions')->insert([
            [   'id' => 1, 'survey_id' => 1, 'question_id' => 1, 'question_order' => 1,],
            [   'id' => 2, 'survey_id' => 1, 'question_id' => 2, 'question_order' => 2,],
            [   'id' => 3, 'survey_id' => 1, 'question_id' => 3, 'question_order' => 3,],
            [   'id' => 4, 'survey_id' => 1, 'question_id' => 4, 'question_order' => 4,],
            [   'id' => 5, 'survey_id' => 1, 'question_id' => 5, 'question_order' => 5,],
            [   'id' => 6, 'survey_id' => 1, 'question_id' => 6, 'question_order' => 6,],

            /* SURVEY 2 */
            [   'id' => 7, 'survey_id' => 2, 'question_id' =>  1, 'question_order' => 1,],
            [   'id' => 8, 'survey_id' => 2, 'question_id' =>  2, 'question_order' => 2,],
            [   'id' => 9, 'survey_id' => 2, 'question_id' =>  3, 'question_order' => 3,],
            [   'id' => 10, 'survey_id' => 2, 'question_id' =>  4, 'question_order' => 4,],
            [   'id' => 11, 'survey_id' => 2, 'question_id' =>  5, 'question_order' => 5,],
            [   'id' => 12, 'survey_id' => 2, 'question_id' =>  6, 'question_order' => 6,],

            /* Survey 3 */
            [   'id' => 13, 'survey_id' => 3, 'question_id' =>  7, 'question_order' => 1,],
            [   'id' => 14, 'survey_id' => 3, 'question_id' =>  8, 'question_order' => 2,],
            [   'id' => 15, 'survey_id' => 3, 'question_id' =>  9, 'question_order' => 3,],
            [   'id' => 16, 'survey_id' => 3, 'question_id' => 10, 'question_order' => 4,],
            [   'id' => 17, 'survey_id' => 3, 'question_id' => 11, 'question_order' => 5,],

            [   'id' => 18, 'survey_id' => 4, 'question_id' =>  7, 'question_order' => 1, ],
            [   'id' => 19, 'survey_id' => 4, 'question_id' => 12, 'question_order' => 2, ],
            [   'id' => 20, 'survey_id' => 4, 'question_id' =>  9, 'question_order' => 3, ],
            [   'id' => 21, 'survey_id' => 4, 'question_id' => 13, 'question_order' => 4, ],
            [   'id' => 22, 'survey_id' => 4, 'question_id' => 14, 'question_order' => 5, ],

        ]);
    }
}
