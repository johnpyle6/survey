<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [ "id" => 1, "name" => "content" ],
            [ "id" => 2, "name" => "footer" ],
            ["id" => 3, "name" => "date" ],
            ["id" => 4, "name" => "image" ],
            [ "id" => 5, "name" => "ad" ],
        ]);
    }
}
