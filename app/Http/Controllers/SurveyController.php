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
    
    
    /** Route Controllers **/
    function index(){}

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
    
    function edit($survey_id){
        
        
        if ($survey_id == "new"){
            $survey_id = $this->createSurvey();
            return redirect('survey/edit/' . $survey_id);
        }else{
            $components = DB::select("
                SELECT a.order, b.content, b.id
                FROM survey_components a, components b
                WHERE a.survey_id = $survey_id
                    AND b.id = a.component_id
                ORDER BY a.order");
            
            $images = DB::select("
                SELECT filename, id
                FROM survey_images
            ");
            
            $layout = DB::select("
                SELECT 
                    a.name, a.footer, a.date, b.filename bgimage
                FROM 
                    layouts a
                LEFT JOIN images b
                	ON a.bg_image_id = b.id
                WHERE 
                    a.id = $survey_id");
            if ($layout){
                $layout = $layout[0];
            }
            
            
            $questions = DB::select("
                SELECT id, text
                FROM questions
            ");
            
            $answers = DB::select("
                SELECT id, text
                FROM answers 
            ");
            
            $survey = new \stdClass();
            $survey->id = $survey_id;
            $survey->questions = $this->get_survey_questions($survey_id);
            $lists = $this->getLists();
            $ads = $this->getAds();
            
            //print_r($components);    
            return view('survey.create',
                compact($components,$images,$layout,$questions,$answers,$survey,$lists,$ads)
            );
        }
    }



/************************************************
 * Create Survey Business Logic
*************************************************/

    function createSurvey(){
        $id = DB::table('layouts')->insertGetId();
        return $id;
    }

/************************************************
 * CRUD - library
 *************************************************/
    function saveComponent(Request $req){
        // TODO: test sanitize
        //$html = HTML::entities($req->get('$html'));

        //TODO: extract create component
        $id = DB::table('components')->insertGetId([
            'content' => $req->get('html'),
        ]);

        echo json_encode([ "id" => $id]);
    }

    function editComponent(Request $req){
        // TODO: sanitize
        $success = DB::table( 'components' )
            ->where( 'id', $req->get('id') )
            ->update(['content' => $req->get('html')]);
        
        echo json_encode(["success" => $success]);
    }

    function saveImage(Request $req){
        // TODO: is background image?
        if ( $req->hasFile('image')){
            $file = $req->file('image');
            if ($file->isValid()){
                $file->move(public_path() . '/images', $file->getClientOriginalName());
            }
        }

        DB::table('survey_images')->insert(
            [ 'filename' => $file->getClientOriginalName() ]
        );

        return redirect('survey/edit/' . $req->get('survey_id'));
    }

    function saveQuestion(Request $request){
        $text = $request->get('text');
        $id = DB::table('questions')->insertGetId(
            ['text' => $text]
        );

        return "$id";
    }

    function saveAnswer(Request $request){
        $text = $request->get('text');
        $id = DB::table('survey_answers')->insertGetId(
            ['text' => $text]
        );

        return "$id";
    }



/************************************************
 * CRUD - layouts
 *************************************************/
    // TODO: combine into one update function
    function saveLayout(Request $req){
        $update = [];
        if ($req->get('bg_image_id')){
            $update['bg_image_id'] = $req->get('bg_image_id');
        }

        if ($req->get('lists')){
            $update['lists'] = $req->get('lists');
        }

        if ($req->get('name')){
            $update['name'] = $req->get('name');
        }

        if ($req->get('footer')){
            $update['footer'] = $req->get('footer');
        }

        // TODO: sanitize
        DB::table('layouts')
            ->where('id', $req->get('survey_id'))
            ->update($update);
    }

    /*
    function saveBgImage(Request $req){
        // TODO: sanitize
        DB::table('layouts')
            ->where('id', $req->get('survey_id'))
            ->update(['bg_image_id' => $req->get('bg_image_id')]);

        echo true;
    }

    function saveLists(Request $req){
        DB::table("layouts")
            ->where('id', '=', $req->get('survey_id'))
            ->update(['lists' => $req->get('lists')]);
    }

    function saveName(Request $req){
        DB::table("layouts")
            ->where('id', '=', $req->get('survey_id'))
            ->update(['name' => $req->get('name')]);
    }

    function saveFooter(Request $req){
        // TODO: sanitize
        // TODO: save this as a component and save the component id in layouts
        DB::table('layouts')
            ->where('id', $req->get('survey_id'))
            ->update(['footer' => $req->get('footer')]);
    }
    */



/************************************************
 * CRUD - maps
 *************************************************/

    function saveSurveyAnswer(Request $request){
        $question_id = $request->get('qid');
        $question_order = $request->get('qorder');
        $answer_id = $request->get('aid');
        $answer_order = $request->get('aorder');
        $survey_id = $request->get('survey_id');

        $id = DB::table('survey_questions')->insertGetId(
            compact( $survey_id, $question_id, $question_order, $answer_id, $answer_order)
        );

        // TODO: Proper error handling
        return $id;
    }

    function deleteSurveyAnswer(Request $request){
        DB::table('survey_survey')
            ->where('survey_id', '=', $request->get('survey_id'))
            ->where('question_id', '=', $request->get('qid'))
            ->where('answer_id', 'LIKE', $request->get('aid'))
            ->delete();
    }

    function add_component_to_survey(Request $req){
        $success = DB::table('survey_components')->insert([
            'survey_id' => $req->get('survey_id'),
            'component_id' => $req->get('component_id'),
            'order' => $req->get('order'),
        ]);

        echo $success;
    }

    // TODO: rename to delete_content_from_survey
    function remove_content_from_survey(Request $req){
        $success = DB::table('components')
            ->where('component_id', $req->get('id'))
            ->delete();
        echo $success;
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