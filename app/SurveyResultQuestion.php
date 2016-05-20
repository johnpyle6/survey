<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SurveyQuestion
 * @package App
 */
class SurveyResponseQuestion extends Model
{
    protected $fillable = [];
    public $timestamps = false;


    /**
     * A SurveyResponseQuestion is one question answered on one Survey.
     * A SurveyResponseQuestion belongs to one SurveyResult
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function surveyResult(){
        return $this->belongsTo('App\SurveyResponse');
    }
    
    
    /**
     * A SurveyResultQuestion has one Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(){
        return $this->belongsTo('App\Question');
    }

    /**
     * A SurveyResultQuesetion has one Answer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers(){
        return $this->hasMany('App\SurveyAnswer');
    }


}
