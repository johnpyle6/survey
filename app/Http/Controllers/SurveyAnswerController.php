<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class SurveyAnswerController
 * @package App\Http\Controllers
 */
class SurveyAnswerController extends Controller
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
        $survey_answer = new \App\SurveyAnswer;
        $survey_answer->answer_id = $request->get('answer_id');
        $survey_answer->answer_order = $request->get('order');
        $survey_answer->save();

        \App\SurveyQuestion::find( $request->get('survey_question_id') )
            ->surveyAnswers()
            ->attach( $survey_answer->id );

        return $survey_answer;
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
        $survey_answer = \App\SurveyAnswer::find($id);
        $survey_answer->answer_order = $request->get('order');
        $survey_answer->save();

        return $survey_answer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $survey_question = \App\SurveyQuestion::find( $request->get('survey_question_id') );
        $survey_question->surveyAnswers()->detach($id);
        return (integer) \App\SurveyAnswer::find( $id )->delete();
    }
}
