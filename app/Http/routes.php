<?php

use App\Http\Controllers\SurveyController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $surveys = DB::select("SELECT id, name FROM survey");
    return view('survey.home', ['surveys' => $surveys]);
}); 


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});


Route::get('error', 'SurveyController@error');
/*
 * Legacy URLs for 1st survey
 */
Route::get('survey/{survey_id}', 'SurveyController@index');
Route::post('survey/saveResponse', 'SurveyController@saveResponse');

/**
 * Current Routes for survey 
 */
Route::post('survey/home', 'SurveyController@home');
Route::get('survey/view/{survey_id}/{tag_id?}', 'SurveyController@view');
Route::get('survey/thank-you/{survey_id}', 'SurveyController@thankYou');
Route::get('survey/results/{survey_id}', 'SurveyController@getResults');
Route::post('survey/submit', 'SurveyController@submit');

/**
 * Routes for survey creation
 */
Route::get('survey/edit/{survey_id}', 'SurveyController@edit');
Route::get('survey/getAnswers', 'SurveyController@getAnswers');
Route::get('survey/rest/getLists', 'SurveyController@getLists');

Route::post('survey/rest/saveQuestion', 'SurveyController@saveQuestion');
Route::post('survey/rest/saveAnswer', 'SurveyController@saveAnswer');
Route::post('survey/rest/saveSurveyQA', 'SurveyController@saveSurveyQA');
Route::post('survey/rest/deleteSurveyQA', 'SurveyController@deleteSurveyQA');
Route::post('survey/rest/deleteSurveyAnswer', 'SurveyController@deleteSurveyAnswer');
Route::post('survey/rest/saveImage', 'SurveyController@saveImage');
Route::post('survey/rest/saveLists', 'SurveyController@saveLists');
Route::post('survey/rest/saveName', 'SurveyController@saveName');

Route::post('survey/rest/saveComponent', 'SurveyController@saveComponent');
Route::post('survey/rest/editComponent', 'SurveyController@editComponent');
Route::post('survey/rest/saveBgImage', 'SurveyController@saveBgImage');
Route::post('survey/rest/remove', 'SurveyController@removeContent');
Route::post('survey/rest/saveFooter', 'SurveyController@saveFooter');
/**
 * Test routes
 */
Route::get('survey/test/{survey_id}', 'SurveyController@modelTest');
Route::get('signup/test', 'SurveyController@formSubmitHandler');

