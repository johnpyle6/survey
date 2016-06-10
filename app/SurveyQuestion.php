<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
/**
 * Class SurveyQuestion
 * @package App
 */
class SurveyQuestion extends Model
{
    protected $fillable = [];
    public $timestamps = false;




    /**
     * A SurveyQuestion is owned by one Survey
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey(){
        return $this->belongsTo('App\Survey');
    }


    public function question(){
        return $this->belongsTo('App\Question');
    }


    /**
     * A SurveyQuestion has many SurveyAnswer(s)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function surveyAnswers(){
        return $this->belongsToMany('App\SurveyAnswer');
    }



}
