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

    		[  'id' => 1, 'name' => 'first survey',  ],
            [  'id' => 2, 'name' => 'first survey edited', ],
            [  'id' => 3, 'name' => 'second survey', ],
            [  'id' => 4, 'name' => 'second survey edited',  ],
  
        ]);

    }
}
