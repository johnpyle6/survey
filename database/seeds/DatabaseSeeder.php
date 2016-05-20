<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	$this->call('SurveyTableSeeder');
        $this->call('QuestionsTableSeeder');
        $this->call('AnswersTableSeeder');
    	$this->call('SurveyQuestionsTableSeeder');
    	$this->call('SurveyAnswersTableSeeder');
        //$this->call('SurveyResponsesTableSeeder');
        //$this->call('SurveyLayoutsTableSeeder');
        ///$this->call('SurveyThanksLayoutsTableSeeder');
        //$this->call('SurveyAdsTableSeeder');
        //$this->call('SurveyThanksAdsTableSeeder');
        //$this->call('SurveyResultsAdsTableSeeder');

    }
}
