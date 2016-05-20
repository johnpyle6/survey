<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [];
	public $timestamps = true;

    /**
     * A Question can belong to many SurveyQuestions
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function question(){
        return $this->hasMany('App\SurveyQuestion');
    }

}
