<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SurveyResult
 * @package App
 */
class SurveyResult extends Model
{
	protected $fillable = ['name', 'footer', 'date', 'bg_image_id', 'lists'];
	public $timestamps = true;


    /**
     * A
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function survey_result_question(){
		return $this->hasOne('App\SurveyResultQuestion');
	}
	/*
        public function layout(){
            return $this->hasOne('SurveyLayout');
        }

        public function content(){
            return $this->hasMany('SurveyContent');
        }
    */

   		// Can this be a Survey Answer with properties added?
	// answer
		// number of answers
	    // percentage of answers
	
	// non answers
	   // number of answers
	   // percentage of answers
		  
}
