<?php

use Illuminate\Database\Seeder;

class ContentTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_layouts')->insert([
            
            ['content_id' => 2, 'tag_id' => 2, 'created_at' => '2016-05-28 15:28:25', 'updated_at' => '2016-05-28 15:28:25', ],
            ['content_id' => 3, 'tag_id' => 2, 'created_at' => '2016-05-28 15:28:25', 'updated_at' => '2016-05-28 15:28:25', ],
        ]);
    }
}
