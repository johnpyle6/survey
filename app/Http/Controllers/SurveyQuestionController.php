<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SurveyQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $survey_question = new \App\SurveyQuestion;
        $survey_question->survey_id = $request->get('survey_id');
        $survey_question->question_id = $request->get('question_id');
        $survey_question->question_order = $request->get('order');
        $survey_question->save();
        return $survey_question;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $survey_question = \App\SurveyQuestion::find($id);
        $survey_question->question_order = $request->get('order');
        $survey_question->save();
        return $survey_question;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey_question = \App\SurveyQuestion::find( $id );
        if (! is_null($survey_question) ){
            $survey_answers = $survey_question->surveyAnswers;
            $survey_question->surveyAnswers()->detach();
            $survey_question->delete();
            foreach ($survey_answers as $answer){
                \App\SurveyAnswer::find( $answer->id )->delete();
            }

        }
        return 1;
    }

    public function attachSurveyAnswer(Request $request){
        $surveyQuestion = \App\SurveyQuestion::find( $request->get('survey_question_id') );
        if (!empty($surveyQuestion)) {
            $surveyQuestion->surveyAnswers()->attach( $request->get('survey_answer_id') );
        }
    }
}


