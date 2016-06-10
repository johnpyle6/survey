<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->text("content");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('content_survey', function (Blueprint $table) {
            $table->integer('content_id')->unsigned();
            $table->foreign('content_id')->references('id')->on('contents')->delete('cascade');

            $table->integer('survey_id')->unsigned();
            $table->foreign('survey_id')->references('id')->on('surveys')->delete('cascade');;

            $table->smallInteger('order');

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
        Schema::drop('contents');
        Schema::drop('content_survey');
    }
}
