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

            [ 'id' => 1, 'content' => '{{ echo date("M d, Y") }}'],
            [ 'id' => 2, 'content' => '<ul>&copy; Copyright FOO Solutions 555 Bar Ave. Anytown US 12345.<br><li><a href="http://www.google.com" target="_blank">Website</a></li><li><a href="mailto:test@test.com" target="_blank">Contact us</a></li><li class="last"><a href="http://google.com/terms-products.htm">Website Terms, Conditions &amp; Privacy Policy</a></li><ul>', ],
            [ 'id' => 3, 'content' => '<ul><li><a class="footer-link" target="_blank" href="http://www.google.com/">Website Terms Conditions, Privacy &amp; Anti-Spam Policy</a></li><li>Bar Authority 5036 Foo Blvd Yourtown US 54321</li><li>Email: <a href="mailto:info@wealthauthority.com">info@wealthauthority.com</a>Office: 407-574-5285 M-F 9am-5pm EST.</li><li>All rights reserved. Use authorized by written permission only.</li></ul>', ],
        ]);                        
    }
}
