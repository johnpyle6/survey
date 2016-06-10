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
            [ 'filename' => 'wabg6.jpg', ],
            [ 'filename' => 'bg2.png', ],
            [ 'filename' => 'a.jpg', ],
            [ 'filename' => 'brnvideo1.jpg', ],
            [ 'filename' => 'donald_trump.jpg', ],
            [ 'filename' => 'trump.jpg', ],
            [ 'filename' => 'trump2.jpg', ],
        ]);
    }
}
