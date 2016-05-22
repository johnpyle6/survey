<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    public $timestamps = false;

    /**
     * A SurveyAnswer has one Answer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer(){
        return $this->belongsTo('App\Answer');
    }

    public function survey_question(){
        return $this->belongsToMany('App\SurveyQuestion');
    }
}
