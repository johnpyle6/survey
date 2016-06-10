<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('answer_id')->unsigned();
            $table->tinyInteger('answer_order');
            $table->timestamps();

            $table->foreign('answer_id')->references('id')->on('answers');
        });

        Schema::create('survey_answer_survey_question', function (Blueprint $table) {
            $table->integer('survey_question_id')->unsigned()->index();
            $table->foreign('survey_question_id')->references('id')->on('survey_questions');

            $table->integer('survey_answer_id')->unsigned()->index();
            $table->foreign('survey_answer_id')->references('id')->on('survey_answers');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('survey_answers');
    }
}
