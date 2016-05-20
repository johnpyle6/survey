<?php

use Illuminate\Database\Seeder;

class SurveyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('surveys')->insert([

    		[  'id' => 1, 'name' => 'first survey', 'bg_image_id' => 1, 'footer' => 'wa', 'date' => 1, 'lists' => '33877,33921' ],
            [  'id' => 2, 'name' => 'first survey edited', 'bg_image_id' => 1, 'footer' => 'wa', 'date' => 1, 'lists' => '33877,33921' ],                            
            [  'id' => 3, 'name' => 'second survey', 'bg_image_id' => 2, 'footer' => 'lop', 'date' => 1, 'lists' => '33877,33906' ],
            [  'id' => 4, 'name' => 'second survey edited', 'bg_image_id' => 2, 'footer' => 'lop', 'date' => 1, 'lists' => '33877,33906' ],
  
        ]);

    }
}
