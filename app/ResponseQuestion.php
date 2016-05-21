<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponseQuestion extends Model
{


    /**
     * A SurveyResultQuestion is owned by one SurveyResult
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function response(){
        return $this->belongsTo('App\Response');
    }

    /**
     * A SurveyQuestion has one question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function question(){
        return $this->belongsTo('App\Question');
    }

    /*
    public function answers(){
        return $this->hasMany('App\SurveyAnswer');
    }*/
    //
}
