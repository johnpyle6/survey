<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Survey extends Model
{
	protected $fillable = ['name', 'footer', 'date', 'bg_image_id', 'lists'];
	public $timestamps = true;
	private $survey_id;
	public $questions;




	/**
	 * A survey can have many SurveyQuestions
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function surveyQuestions(){
	    return $this->hasMany('App\SurveyQuestion');
	}


	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();
	}
	



	/**
	 * A survey can have many contents
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function content(){
		return $this->belongsToMany('App\Content');
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
