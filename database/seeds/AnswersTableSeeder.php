<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('answers')->insert([
			[ 'id' => 1, 'text' => 'Yes'],
			[ 'id' => 2, 'text' => 'No'],
			[ 'id' => 3, 'text' => 'Other'],

			[ 'id' => 4, 'text' => 'Very likely'],
			[ 'id' => 5, 'text' => 'Somewhat likely'],
			[ 'id' => 6, 'text' => 'Somewhat unlikely'],
			[ 'id' => 7, 'text' => 'No chance at all'],

			[ 'id' => 8, 'text' => 'Hillary Clinton',],
    		[ 'id' => 9, 'text' => 'Ted Cruz',],
    		[ 'id' => 10, 'text' => 'John Kasich'],
    		[ 'id' => 11, 'text' => 'Bernie Sanders'],
    		[ 'id' => 12, 'text' => 'Donald Trump'],
			[ 'id' => 13, 'text' => 'Jeb Bush'],
			[ 'id' => 14, 'text' => 'Ben Carson'],
			[ 'id' => 15, 'text' => 'Chris Christie'],
			[ 'id' => 16, 'text' => 'Carly Fiorina'],
			[ 'id' => 17, 'text' => 'Rand Paul'],
			[ 'id' => 18, 'text' => 'Mike Huckabee'],
			[ 'id' => 19, 'text' => 'Marco Rubio'],
			[ 'id' => 20, 'text' => 'Gary Johnson'],

            [ 'id' => 21, 'text' => 'Yes, I support his immigration policy'],
            [ 'id' => 22, 'text' => 'No, I do not support his immigration policy'],
            [ 'id' => 23, 'text' => 'I agree with parts of his immigration policy, but do not fully support it'],

            [ 'id' => 24, 'text' => 'None. There isn\'t a republican candidate who can take down Hilary Clinton'],



    	]);
    }
}
