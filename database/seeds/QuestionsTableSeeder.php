<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('questions')->insert([
    		[ 'id' => 1, 'text' => 'Which Presidential candidate is best for the overall economy?', ],
    		[ 'id' => 2, 'text' => 'Which Presidential candidate is most likely to hurt the economy if they win?', ],
    		[ 'id' => 3, 'text' => 'Your stock market portfolio is most likely to rise if this candidate is elected�', ],
    		[ 'id' => 4, 'text' => 'I believe this candidate will create the most jobs while in office', ],
    		[ 'id' => 5, 'text' => 'Regardless of party affiliation who do you think will win the 2016 election for President?', ],
    		[ 'id' => 6, 'text' => 'Do you believe that a stock market crash is possible in the next 18 months?', ],

            [ 'id' => 7, 'text' => 'Do you think Donald Trump is qualified be the next president of the United States?', ],
            [ 'id' => 8, 'text' => 'How would you rate Donald Trump\'s chances of winning the republican nomination?', ],
            [ 'id' => 9, 'text' => 'Do you agree with Donald Trump\'s Policy on immigration?', ],
            [ 'id' => 10, 'text' => 'Which Republican candidate do you think has the best chance of beating Hilary Clinton in the general election?', ],
            [ 'id' => 11, 'text' => 'Which candidate would you most like to see win the Republican nomination for President?', ],

            [ 'id' => 12, 'text' => 'How would you rate Donald Trump\'s chances of becoming President?', ],
            [ 'id' => 13, 'text' => 'Which candidate would you most like to see as our next President?', ],
            [ 'id' => 14, 'text' => 'Regardless of party affiliation who do you believe will be our next President?', ],
    	                
    	]);
    }
}
