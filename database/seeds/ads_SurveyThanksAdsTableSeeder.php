<?php

use Illuminate\Database\Seeder;

class SurveyThanksAdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_thanks_ads')->insert([
            ['survey_id' => 1, 'ad_id' => 1, 'order' => 1,],
            ['survey_id' => 1, 'ad_id' => 2, 'order' => 2,],
            ['survey_id' => 1, 'ad_id' => 3, 'order' => 3,],
            
            ['survey_id' => 2, 'ad_id' => 1, 'order' => 1,],
            ['survey_id' => 2, 'ad_id' => 2, 'order' => 2,],
            ['survey_id' => 2, 'ad_id' => 3, 'order' => 3,],
                        
            ['survey_id' => 3, 'ad_id' => 2, 'order' => 1,],
            ['survey_id' => 3, 'ad_id' => 3, 'order' => 2,],
            ['survey_id' => 3, 'ad_id' => 5, 'order' => 4,],
            ['survey_id' => 3, 'ad_id' => 4, 'order' => 5,],
            ['survey_id' => 3, 'ad_id' => 6, 'order' => 6,],
                        
            ['survey_id' => 4, 'ad_id' => 2, 'order' => 1,],
            ['survey_id' => 4, 'ad_id' => 3, 'order' => 2,],
            ['survey_id' => 4, 'ad_id' => 5, 'order' => 4,],
            ['survey_id' => 4, 'ad_id' => 4, 'order' => 5,],
            ['survey_id' => 4, 'ad_id' => 6, 'order' => 6,],
        ]);
    }
}
