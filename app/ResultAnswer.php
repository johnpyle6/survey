<?php

namespace App;

use DB;
//use Illuminate\Database\Eloquent\Model;

class ResultAnswer //extends Model
{
    protected $survey_id;
    protected $answer_id;
    protected $survey_question_id;
    protected $votes;

    public $text;
    public $order;
    public $total_votes;
    public $percent;

    /**
     * ResultAnswer constructor.
     * @param $survey_id
     * @param $answer_id
     * @param $question_id
     */
    public function __construct($survey_id, $answer_id, $survey_question_id)
    {
        $this->survey_id = $survey_id;
        $this->answer_id = $answer_id;
        $this->survey_question_id = $survey_question_id;
        $this->get_properties();
        $this->percent = (Integer) round( ($this->get_votes() / $this->get_total_votes()) * 100, 0) . '%';
    }



    private function get_properties()
    {
        $properties = DB::select(
            "SELECT a.text, b.answer_order 
             FROM answers a, survey_answers b
             WHERE b.survey_question_id = $this->survey_question_id
                 AND b.answer_id = $this->answer_id
                 AND a.id = b.answer_id
             ORDER BY b.answer_order"
        );

        $this->text = $properties[0]->text;
        $this->order = $properties[0]->answer_order;
    }

    private function get_votes()
    {
        return DB::select("
            SELECT 
                COUNT(answer_id) votes    
            FROM 
                responses
            WHERE 
                survey_id = $this->survey_id AND
                survey_question_id = $this->survey_question_id AND
                answer_id = $this->answer_id
        ")[0]->votes;
    }

    private function get_total_votes(){
        return DB::select("
            SELECT 
                COUNT(answer_id) votes    
            FROM 
                responses
            WHERE 
                survey_id = $this->survey_id AND
                survey_question_id = $this->survey_question_id
        ")[0]->votes;
    }





}
