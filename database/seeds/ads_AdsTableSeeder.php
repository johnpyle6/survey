<?php

use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_ads')->insert([
    		[ 'id' => 1, 'ad_name' => 'retirement', 'template_name' => 'retirement', 'ad_style' => 1],
            [ 'id' => 2, 'ad_name' => 'paracord', 'template_name' => 'paracord', 'ad_style' => 1],
            [ 'id' => 3, 'ad_name' => 'financial book', 'template_name' => 'financialbook', 'ad_style' => 1],
                        
            [ 'id' => 4, 'ad_name' => 'irs', 'template_name' => 'irs', 'ad_style' => 2],
            [ 'id' => 5, 'ad_name' => 'Social Security', 'template_name' => 'socialSecurity', 'ad_style' => 2],
            [ 'id' => 6, 'ad_name' => 'assistance', 'template_name' => 'assistance', 'ad_style' => 2],
            [ 'id' => 7, 'ad_name' => 'Broke Redneck', 'template_name' => 'brokeRedneck', 'ad_style' => 2],
        ]);
    }
}
