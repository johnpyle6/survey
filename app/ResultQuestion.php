<?php

namespace App;
use DB;
//use Illuminate\Database\Eloquent\Model;

class ResultQuestion
{
    public $survey_id;
    public $question_id;
    private $survey_question_id;
    public $text;
    public $order;
    public $answers = [];


    /**
     * ResultQuestion constructor.
     */
    public function __construct($survey_id, $question_id)
    {
        echo $survey_id . ":" . $question_id;

        $this->survey_id = $survey_id;
        $this->question_id = $question_id;
        $this->get_properties();
    }


    public function get_properties()
    {
        $properties = DB::select("
            SELECT a.text, b.question_order, b.id
            FROM questions a, survey_questions b
            WHERE b.survey_id = $this->survey_id
                AND b.question_id = $this->question_id
                AND a.id = b.question_id
            GROUP BY b.question_id
            ORDER BY b.question_order
        ");

        $this->text = $properties[0]->text;
        $this->order = $properties[0]->question_order;
        $this->survey_question_id = $properties[0]->id;
    }

    public function get_answers()
    {
        $answers = DB::select("
            SELECT answer_id
            FROM survey_answers
            WHERE survey_question_id = $this->survey_question_id
        ");

        foreach ($answers as $answer){
            $this->questions[] = new ResultAnswer($this->survey_id, $answer->answer_id, $this->question_id);
        }
    }


}
