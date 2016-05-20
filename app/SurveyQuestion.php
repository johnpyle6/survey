<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    /**
     * A SurveyQuestion has one question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function question(){
        return $this->belongsTo('App\Question');
    }
    
    public function answers(){
        return $this->hasMany('App\SurveyAnswer');
    }


}
