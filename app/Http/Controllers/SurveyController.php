<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Survey;

class SurveyController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }

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
        $new_survey = new \App\Survey;
        $new_survey->save();
        return $new_survey;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question_id = $request->get('question_id');
        $survey_id = $request->get('survey_id');
        $response = new \stdClass();

        $survey_question = \App\SurveyQuestion::
            where('question_id', $question_id)
            ->where('survey_id', $survey_id)
            ->first();

        if ( is_null($survey_question) ){
            $survey_question = new \App\SurveyQuestion;
            $survey_question->question_id = $question_id;
            $survey_question->survey_id = $survey_id;
        }

        $survey_question->question_order = $request->get('question_order');
        $survey_question->save();
        $response->survey_question_id = $survey_question->id;
        $response->question_id = $question_id;
        $response->survey_answers = [];

        $ids = explode(',', $request->get('answer_id'));
        //$id = $request->get('answer_id');
        foreach ($ids as $key => $id) {
            $survey_answer = new \App\SurveyAnswer;
            $survey_answer->answer_id = $id;
            $survey_answer->answer_order = $key;
            $survey_answer->save();
            $survey_question->surveyAnswers()->attach($survey_answer->id);
            $response_answer = new \stdClass();
            $response_answer->survey_answer_id = $survey_answer->id;
            $response_answer->answer_id = $id;
            $response->survey_answers[] = $response_answer;
        }


        return json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = \App\Survey::find($id);
        return view('survey.layouts.surveyApp', ['survey' => $survey, ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($survey_id)
    {
        $survey = \App\Survey::find($survey_id);
        $survey->surveyQuestions = $survey->surveyQuestions->sortBy('question_order');
        foreach ($survey->surveyQuestions as $question){
            $question->surveyAnswers = $question->surveyAnswers->sortBy('answer_order');
        }
        $survey->images = \App\Image::lists('filename');
        $view = ( is_null($survey) ) ? $view = 'survey.error' : 'survey.create';
        return view($view, ['survey' => $survey]);
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
        $survey = \App\Survey::find($id);
        $survey->name = $request->get('name');
        $survey->save();
        return $survey;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = \App\Content::find($id);

        // TODO: handle no surveys found
        $surveys = $content->survey->lists('id');
        foreach ($surveys as $survey_id) {
            $survey = \App\Survey::find($survey_id);

            // TODO: handle detach fail
            $survey->content()->detach($id);
        }


        // TODO: ERROR HANDLING
        $content->delete();

        return "true";
    }



    public function attachContent(Request $request)
    {
        $survey = \App\Survey::find($request->get('survey_id'));
        if ( !empty($survey) ) {
            $survey->content()->attach($request->get('content_id'));
        }
    }

    public function detachContent(Request $request)
    {
        $survey = \App\Survey::find($request->get('survey_id'));
        if ( !empty($survey) ) {
            $survey->content()->detach($request->get('content_id'));
        }
    }


    public function attachTag(Request $request){
        $tag_name = $request->get('tag');
        $tag = \App\Tag::where('name', $tag_name)->first();

        if ( empty($tag) ){
            $tag = new \App\Tag;
            $tag->name = $tag_name;
            $tag->save();
        }

        $survey = \App\Survey::find( $request->get('survey_id') );
        if (!empty($survey)) {
            $survey->tags()->attach($tag->id);
        }
    }

    
    public function setOrder(Request $request){
        $survey = \App\Survey::find($request->get('survey_id'));
        $content_id = $request->get('content_id');
        $order = $request->get('order');
        $survey->content()->detach( $content_id);
        $survey->content()->attach( $content_id, ['order' => $order] );

        // TODO: doing it like this adds another row to the pivot table
        //$survey->content()->sync([$content_id => ['order' => $order] ], false);
    }
    


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function newTemplate(){
        $survey = Survey::where('id', 1)->first();
        return view('survey.layouts.surveyApp', ['survey' => $survey, ]);
    }


    function view($survey_id, $tag = 'none'){
        $survey = $this->buildSurvey($survey_id, $tag);
        return view('survey.layouts.surveyMain', ['survey' => $survey, ]);
    }

    function thankYou($survey_id){
        $survey = $this->buildThankYou($survey_id);
        return view('survey.layouts.thankYou', ['survey' => $survey, ]);
    }

    function results($survey_id){
        $survey = $this->build_results($survey_id);
        return view('survey.layouts.results', ['survey' => $survey]);
    }
    
    function submit(Request $request){
        $this->validateSubmit($request);
        $this->formSubmitHandler($request);
        //$this->acSubscribe();
        return redirect('/survey/thank-you/' . $request->get('surveyId') );        
    }
    





/************************************************
 * CRUD - population
 *************************************************/
    
    function getLists(){
        $url = 'https://api.ongage.net/api/lists';
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $url);
        $headers = array(
            'X_USERNAME: ' . 'pyle',
            'X_PASSWORD: ' . 'Champ2244',
            'X_ACCOUNT_CODE: ' . 'lop_solutions',
        );
                
        curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        $response_raw = curl_exec($c);
                
        $errno =  curl_errno ( $c );
        $results = json_decode($response_raw);
                
        if (empty($errno)){
            if ( ! empty($results->payload->failed)){
                //var_dump($result);
            }
        }
        
        //echo "<pre>";
        //print_r( $results);
        //echo "</pre>"; 
        $lists = array();
        foreach ($results->payload as $result){
            $lists[] = [
                "name" => $result->name,
                "id" => $result->id,
            ];
        }
        return $lists;
        
    }
   
    
    function getAds(){
        $ads = DB::table('survey_ads')
            ->get();
        return $ads;
    }

    function get_all_questions(){
        $questions = DB::select("
            SELECT id, question
            FROM survey_questions
        ");

        return $questions;
    }




/************************************************
 * CRUD - build
 *************************************************/

    
    function get_properties($survey_id){
        // TODO: Use first()?
        $properties = DB::select("
            SELECT 
                name, footer, date, bg_image_id
            FROM 
                properties
            WHERE
                survey_id = $survey_id");  //->first();

        return $properties;
    }

    function buildSurvey($survey_id, $tag){
        $survey = new \stdClass();
        $survey->id = $survey_id;
        $survey->tag = $tag;
        $survey->properties = $this->get_survey_properties($survey_id);
        $survey->questions = $this->get_survey_questions($survey_id);
        return $survey;
    }
    
    function buildThankYou($survey_id){
        $survey = new \stdClass();
        $survey->layout = $this->get_thanks_layout($survey_id);
        
        return $survey;
    }

    function build_results($survey_id){
        $results = '';
        return $results;
    }




/************************************************
 * CRUD - forms
 *************************************************/

    function validateSubmit(Request $request){
        $survey_id = $request->get('surveyId');
        $this->validate($request, [
            'firstName' => 'required|alpha',
            'email' => 'required|email',
        ]);

        // TODO: can this be done using laravel validate rules or something?
        $num_questions = DB::select("
            SELECT count(distinct question_id) count 
            FROM survey 
            WHERE survey_id=$survey_id
        ")[0]->count;
        
        if ($num_questions > count( $request->get('question') ) ){
            return redirect('survey/view/' . $survey_id)
                ->withErrors(['questions'])
                ->withInput();
        }
    }

    function save_survey_responses($question, $email, $survey_id, $first_name, $email, $tag){
        foreach ( $question as $question_id => $answer_id ){
            $id = DB::table('responses')->insert(
                compact( $survey_id, $question_id, $answer_id, $ip, $tag, $first_name, $email, $tag)
            );
        }
    }


    function formSubmitHandler(Request $req){
        $survey_id = $req->get('surveyId');
        $tag = $req->get('tag');
        $email = $req->get('email');
        $first_name = $req->get('firstName');
        $ip = $req->ip();

        $this->validate($req, [
            'email' => 'required|email',
            'firstName' => 'required|alpha'
        ]);

        $this->save_survey_responses($req->get('question'), $email, $survey_id, $first_name, $email, $ip, $tag);
        $this->subscribe($survey_id);
    }

    function subscribe($suvery_id){
        $l = DB::select("SELECT lists FROM survey_layouts WHERE survey_id=$survey_id");
        $lists = explode(',', $l[0]->lists);

        foreach ($lists as $list){
            $this->ongageAddContact($email, $list);
        }
    }

    function ongageAddContact($email, $listid = 33897){
        echo $listid . "<br>";
        $request_json = json_encode([
            'email' => $email,
            'list_id' => $listid
        ]);

        $link = '/api/v2/contacts';
        $c = curl_init();


        curl_setopt_array($c, [
            CURLOPT_URL => 'https://api.ongage.net/api/v2/contacts',
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => $request_json,
            CURLOPT_HTTPHEADER => [
                'X_USERNAME: ' . 'pyle',
                'X_PASSWORD: ' . 'Champ2244',
                'X_ACCOUNT_CODE: ' . 'lop_solutions',
            ],
            CURLOPT_RETURNTRANSFER => 1,
        ]);
	
        $response_raw = curl_exec($c);
        $errno =  curl_errno ( $c );
        $result = json_decode($response_raw);

        // TODO: Proper error handling
        echo "<pre>";
        print_r(curl_getinfo($c));
        echo "</pre>";
        
        if (empty($errno) || ! empty($result->payload->errors)){
                echo 'error: ' . curl_error($c);
                echo 'error: json';
        }
    }
    


    

    
    


    
    function getResults($survey_id){
        // get questions
        $survey = new \stdClass();
        $survey->questions = array();
 
        $questions = $this->get_questions($survey_id);
        foreach ($questions as $question){
            $question->answers = array();
            $answers = static::get_answers($survey_id, $question->qid);
            foreach ($answers as $answer){
                $answer->votes = $this->get_votes($survey_id, $question->qid, $answer->answer_id);
                $total_votes = $this->get_total_votes($survey_id, $question->qid);
                $answer->percentage = 0;
                if ($total_votes > 0){
                    
                    $answer->percentage = round( ($answer->votes / $total_votes) * 100); 
                }
                $question->answers[] = $answer;
            }
            $survey->questions[] = $question;
        }
         
        $survey->ads = $this->get_thanks_ads('results', 2, $survey_id);
        $survey->layout = $this->get_survey_layout($survey_id);
        
        
        
        return view('survey.layouts.results', array('survey' => $survey));
        //return '<pre>' . print_r($survey,1) . '</pre>';
    }
    
    
    
    function modelTest($survey_id){
        $survey = Survey::all();
        var_dump($survey);
    }

}