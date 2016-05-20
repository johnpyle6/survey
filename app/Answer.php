<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [];
	public $timestamps = false;

    /**
     * An Answer can belong to many SurveyAnswers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function answer(){
        return $this->hasMany('App\SurveyAnswer');
    }
}
