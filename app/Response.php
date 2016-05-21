<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [];
	protected $table = 'survey_responses';
	public $timestamps = true;


	/**
	 * A survey can have many SurveyQuestions
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function survey_question(){
		return $this->hasMany('App\SurveyQuestion');
	}
	/*
        public function layout(){
            return $this->hasOne('SurveyLayout');
        }

        public function content(){
            return $this->hasMany('SurveyContent');
        }
    */




}
