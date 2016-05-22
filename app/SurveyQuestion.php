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

    /**
     * We only need the text from the question not the whole object so we just pull that
     *
     * @return String question text
     */
    public function getText(){
        //var_dump($this);
        //echo "\n\n";
        return DB::table('questions')
            ->where('id', $this->question_id)
            ->select('text')
            ->first()
            ->text;
    }


    /**
     * A SurveyQuestion has many SurveyAnswer(s)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function surveyAnswers(){
        return $this->hasMany('App\SurveyAnswer');
    }



}
