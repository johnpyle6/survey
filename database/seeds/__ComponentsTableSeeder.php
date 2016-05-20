<?php

use Illuminate\Database\Seeder;

class SurveyComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_layouts')->insert([
            // Survey 1
            [ 'content' => '{{ echo date("M d, Y") }}'],
        ]);                        
    }
}
