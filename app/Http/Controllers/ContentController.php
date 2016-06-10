<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContentController extends Controller
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
        $new_content = new \App\Content;
        $new_content->save();
        return $new_content->id;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        error_log($request->get('content'));
        error_log($request->get('content_id'));

            $content = \App\Content::find( $request->get('content_id') );
            $content->content = $request->get('content');
            $success = $content->save();

        return (integer) $success;
        /** TODO: ERROR HANDLING -> What are all scenarios that would cause a save to fail */

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Content::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function edit($id)
    {
        //
    }
    */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function update(Request $request, $id)
    {
        //
    }
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = \App\Content::find($id);

        $surveys = $content->survey->lists('id');
        foreach ($surveys as $survey_id) {
            $survey = \App\Survey::find($survey_id);

            // TODO: handle detach fail
            $survey->content()->detach($id);
        }

        $tags = $content->tags->lists('id');
        foreach ($tags as $tag_id) {
            // TODO: handle detach fail
            $content->tags()->detach($tag_id);
        }

        // TODO: ERROR HANDLING
        $content->delete();

        return "true";
    }

    public function attachTag(Request $request){
        $tag_name = $request->get('tag');
        $tag = \App\Tag::where('name', $tag_name)->first();

        if ( empty($tag) ){
            $tag = new \App\Tag;
            $tag->name = $tag_name;
            $tag->save();
        }

        $content = \App\Content::find( $request->get('content_id') );
        if (!empty($content)) {
            $content->tags()->attach($tag->id);
        }
    }
}
