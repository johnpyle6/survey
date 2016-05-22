<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [ 'filename' => 'wabg6.jpg', 'type' => 'b', ],
            [ 'filename' => 'bg2.png', 'type' => 'b', ],
        ]);
    }
}
