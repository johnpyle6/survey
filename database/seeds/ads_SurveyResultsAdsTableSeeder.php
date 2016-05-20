<?php

use Illuminate\Database\Seeder;

class SurveyResultsAdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_results_ads')->insert([    
            ['survey_id' => 1, 'ad_id' => 4, 'order' => 1,],
            ['survey_id' => 1, 'ad_id' => 7, 'order' => 2,],
            ['survey_id' => 1, 'ad_id' => 6, 'order' => 3,],

            ['survey_id' => 2, 'ad_id' => 4, 'order' => 1,],
            ['survey_id' => 2, 'ad_id' => 7, 'order' => 2,],
            ['survey_id' => 2, 'ad_id' => 6, 'order' => 3,],                        
                        
            ['survey_id' => 3, 'ad_id' => 4, 'order' => 1,],
            ['survey_id' => 3, 'ad_id' => 7, 'order' => 2,],
            ['survey_id' => 3, 'ad_id' => 6, 'order' => 3,],
                        
            ['survey_id' => 4, 'ad_id' => 4, 'order' => 1,],
            ['survey_id' => 4, 'ad_id' => 7, 'order' => 2,],
            ['survey_id' => 4, 'ad_id' => 6, 'order' => 3,],
                        
        ]);
    }
}
