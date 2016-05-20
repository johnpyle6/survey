<?php

use Illuminate\Database\Seeder;

class SurveyAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_answers')->insert([
            // Question 1
            [   'survey_question_id' => 1, 'answer_id' => 1, 'answer_order' => 1, ],
            [   'survey_question_id' => 1, 'answer_id' => 2, 'answer_order' => 2, ],
            [   'survey_question_id' => 1, 'answer_id' => 3, 'answer_order' => 3, ],
            [   'survey_question_id' => 1, 'answer_id' => 4, 'answer_order' => 4, ],
            [   'survey_question_id' => 1, 'answer_id' => 5, 'answer_order' => 5, ],

            // Question 2
            [   'survey_question_id' => 2, 'answer_id' => 1, 'answer_order' => 1, ],
            [   'survey_question_id' => 2, 'answer_id' => 2, 'answer_order' => 2, ],
            [   'survey_question_id' => 2, 'answer_id' => 3, 'answer_order' => 3, ],
            [   'survey_question_id' => 2, 'answer_id' => 4, 'answer_order' => 4, ],
            [   'survey_question_id' => 2, 'answer_id' => 5, 'answer_order' => 5, ],

            // Question 3
            [   'survey_question_id' => 3, 'answer_id' => 1, 'answer_order' => 1, ],
            [   'survey_question_id' => 3, 'answer_id' => 2, 'answer_order' => 2, ],
            [   'survey_question_id' => 3, 'answer_id' => 3, 'answer_order' => 3, ],
            [   'survey_question_id' => 3, 'answer_id' => 4, 'answer_order' => 4, ],
            [   'survey_question_id' => 3, 'answer_id' => 5, 'answer_order' => 5, ],

            // Question 4
            [   'survey_question_id' => 4, 'answer_id' => 1, 'answer_order' => 1, ],
            [   'survey_question_id' => 4, 'answer_id' => 2, 'answer_order' => 2, ],
            [   'survey_question_id' => 4, 'answer_id' => 3, 'answer_order' => 3, ],
            [   'survey_question_id' => 4, 'answer_id' => 4, 'answer_order' => 4, ],
            [   'survey_question_id' => 4, 'answer_id' => 5, 'answer_order' => 5, ],

            // Question 5
            [   'survey_question_id' => 5, 'answer_id' => 1, 'answer_order' => 1, ],
            [   'survey_question_id' => 5, 'answer_id' => 2, 'answer_order' => 2, ],
            [   'survey_question_id' => 5, 'answer_id' => 3, 'answer_order' => 3, ],
            [   'survey_question_id' => 5, 'answer_id' => 4, 'answer_order' => 4, ],
            [   'survey_question_id' => 5, 'answer_id' => 5, 'answer_order' => 5, ],

            // Question 6
            [   'survey_question_id' => 6, 'answer_id' => 6, 'answer_order' => 1, ],
            [   'survey_question_id' => 6, 'answer_id' => 7, 'answer_order' => 2, ],



            /* SURVEY 2 */
            // Question 1
            [   'survey_question_id' => 7, 'answer_id' => 1, 'answer_order' => 1, ],
            [   'survey_question_id' => 7, 'answer_id' => 5, 'answer_order' => 5, ],

            // Question 2
            [   'survey_question_id' => 8, 'answer_id' => 1, 'answer_order' => 1, ],
            [   'survey_question_id' => 8, 'answer_id' => 5, 'answer_order' => 5, ],

            // Question 3
            [   'survey_question_id' => 9, 'answer_id' => 1, 'answer_order' => 1, ],
            [   'survey_question_id' => 9, 'answer_id' => 5, 'answer_order' => 5, ],

            // Question 4
            [   'survey_question_id' => 10, 'answer_id' => 1, 'answer_order' => 1, ],
            [   'survey_question_id' => 10, 'answer_id' => 5, 'answer_order' => 5, ],

            // Question 5
            [   'survey_question_id' => 11, 'answer_id' => 1, 'answer_order' => 1, ],
            [   'survey_question_id' => 11, 'answer_id' => 5, 'answer_order' => 5, ],

            // Question 6
            [   'survey_question_id' => 12, 'answer_id' => 6, 'answer_order' => 1, ],
            [   'survey_question_id' => 12, 'answer_id' => 7, 'answer_order' => 2, ],


            /* Survey 3 */
            // Question 1
            [   'survey_question_id' => 13, 'answer_id' => 6, 'answer_order' => 1, ],
            [   'survey_question_id' => 13, 'answer_id' => 7, 'answer_order' => 2, ],

            // Question 2
            [   'survey_question_id' => 14, 'answer_id' => 8, 'answer_order' => 1, ],
            [   'survey_question_id' => 14, 'answer_id' => 9, 'answer_order' => 2, ],
            [   'survey_question_id' => 14, 'answer_id' => 10, 'answer_order' => 3, ],
            [   'survey_question_id' => 14, 'answer_id' => 11, 'answer_order' => 4, ],

            // Question 3
            [   'survey_question_id' => 15, 'answer_id' => 12, 'answer_order' => 1, ],
            [   'survey_question_id' => 15, 'answer_id' => 13, 'answer_order' => 2, ],
            [   'survey_question_id' => 15, 'answer_id' => 14, 'answer_order' => 3, ],

            // Question 4
            [   'survey_question_id' => 16, 'answer_id' => 2, 'answer_order' =>  1, ],
            [   'survey_question_id' => 16, 'answer_id' => 3, 'answer_order' =>  2, ],
            [   'survey_question_id' => 16, 'answer_id' => 5, 'answer_order' =>  3, ],
            [   'survey_question_id' => 16, 'answer_id' => 15, 'answer_order' => 4, ],
            [   'survey_question_id' => 16, 'answer_id' => 16, 'answer_order' => 5, ],
            [   'survey_question_id' => 16, 'answer_id' => 17, 'answer_order' => 6, ],
            [   'survey_question_id' => 16, 'answer_id' => 18, 'answer_order' => 7, ],
            [   'survey_question_id' => 16, 'answer_id' => 19, 'answer_order' => 8, ],
            [   'survey_question_id' => 16, 'answer_id' => 20, 'answer_order' => 9, ],
            [   'survey_question_id' => 16, 'answer_id' => 21, 'answer_order' => 10, ],
            [   'survey_question_id' => 16, 'answer_id' => 23, 'answer_order' => 11, ],

            // Question 5
            [   'survey_question_id' => 17, 'answer_id' => 2, 'answer_order' =>  1, ],
            [   'survey_question_id' => 17, 'answer_id' => 3, 'answer_order' =>  2, ],
            [   'survey_question_id' => 17, 'answer_id' => 5, 'answer_order' =>  3, ],
            [   'survey_question_id' => 17, 'answer_id' => 15, 'answer_order' => 4, ],
            [   'survey_question_id' => 17, 'answer_id' => 16, 'answer_order' => 5, ],
            [   'survey_question_id' => 17, 'answer_id' => 17, 'answer_order' => 6, ],
            [   'survey_question_id' => 17, 'answer_id' => 18, 'answer_order' => 7, ],
            [   'survey_question_id' => 17, 'answer_id' => 19, 'answer_order' => 8, ],
            [   'survey_question_id' => 17, 'answer_id' => 20, 'answer_order' => 9, ],
            [   'survey_question_id' => 17, 'answer_id' => 21, 'answer_order' => 10, ],
            [   'survey_question_id' => 17, 'answer_id' => 22, 'answer_order' => 11, ],
            [   'survey_question_id' => 17, 'answer_id' => 23, 'answer_order' => 12, ],

            /* Survey 4*/
            // Question 1
            [   'survey_question_id' => 18, 'answer_id' => 6, 'answer_order' =>  1, ],
            [   'survey_question_id' => 18, 'answer_id' => 7, 'answer_order' =>  2, ],

            // Question 2
            [   'survey_question_id' => 19, 'answer_id' => 8, 'answer_order' =>  1, ],
            [   'survey_question_id' => 19, 'answer_id' => 9, 'answer_order' =>  2, ],
            [   'survey_question_id' => 19, 'answer_id' => 10, 'answer_order' =>  3, ],
            [   'survey_question_id' => 19, 'answer_id' => 11, 'answer_order' =>  4, ],

            // Question 3
            [   'survey_question_id' => 20, 'answer_id' => 12, 'answer_order' =>  1, ],
            [   'survey_question_id' => 20, 'answer_id' => 13, 'answer_order' =>  2, ],
            [   'survey_question_id' => 20, 'answer_id' => 14, 'answer_order' =>  3, ],

            // Question 4
            [   'survey_question_id' => 21, 'answer_id' => 5, 'answer_order' =>  1, ],
            [   'survey_question_id' => 21, 'answer_id' => 1, 'answer_order' =>  2, ],
            [   'survey_question_id' => 21, 'answer_id' => 3, 'answer_order' =>  3, ],
            [   'survey_question_id' => 21, 'answer_id' => 4, 'answer_order' =>  4, ],
            [   'survey_question_id' => 21, 'answer_id' => 24, 'answer_order' =>  5, ],
            [   'survey_question_id' => 21, 'answer_id' => 23, 'answer_order' =>  6, ],

            // Question 4
            [   'survey_question_id' => 22, 'answer_id' => 5, 'answer_order' =>  1, ],
            [   'survey_question_id' => 22, 'answer_id' => 1, 'answer_order' =>  2, ],
            [   'survey_question_id' => 22, 'answer_id' => 3, 'answer_order' =>  3, ],
            [   'survey_question_id' => 22, 'answer_id' => 4, 'answer_order' =>  4, ],
            [   'survey_question_id' => 22, 'answer_id' => 24, 'answer_order' =>  5, ],
            [   'survey_question_id' => 22, 'answer_id' => 23, 'answer_order' =>  6, ],

        ]);

    }
}
