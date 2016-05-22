<?php

namespace App;

use DB;
//use Illuminate\Database\Eloquent\Model;

class Result
{
    //protected $table = "responses";

    protected $survey_id;
    public $questions = [];
    /**
     * Result constructor.
     */
    public function __construct($survey_id)
    {
        $this->survey_id = $survey_id;
        $this->get_questions();

    }

    public function get_questions()
    {
        $lists = DB::select("
            SELECT question_id
            FROM survey_questions
            WHERE survey_id = $this->survey_id
        ");

        foreach ($lists as $list){
            $this->questions[] = new ResultQuestion($this->survey_id, $list->question_id );
        }
    }






}
