@extends('layouts.app')

@section('content')

<section id="create-survey">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
        	<a href="#survey-preview-tab" aria-controls="survey" role="tab"   data-toggle="tab">Survey Build/Preview</a>
        </li>
        <li role="presentation">
    		<a href="#qa-tab" aria-controls="qa" role="tab" data-toggle="tab">Questions & Answers</a>
    	</li>
    	<li role="presentation">
    		<a href="#thank-you-tab" aria-controls="qa" role="tab" data-toggle="tab">Thank You Page</a>
    	</li>
    	<li role="presentation">
    		<a href="#results-tab" aria-controls="qa" role="tab" data-toggle="tab">Result Page</a>
    	</li>
    </ul>
    
    <!-- Tab panes -->
    <div class="tab-content">
        @include('survey.tabs.surveytab')
        @include('survey.tabs.qatab')
		@include('survey.tabs.thankyoutab')
        @include('survey.tabs.resultstab')
	</div>
</section>

@include('survey.modals.tag')
@include('survey.modals.imageModal')
@include('survey.modals.newQuestion')
@include('survey.modals.newAnswer')
@include('survey.modals.bgModal')

@include('survey.layouts.editor-template')








          		




















<!-- 
	
	<div id="survey-create" class="col-md-6 col-sm-6" style="background-color: wheat">
	{!! Form::open(array('url' => '/survey/create/save')) !!}
		<h3>Survey Builder</h3>
		<p>
			{!! Form::label('tag', 'Survey Tag:', ['class' => '']) !!}
            {!! Form::text('tag', '', ['class' => 'form-control']) !!}
    		          
			{!! Form::label('surveyName', 'Survey Name:', ['class' => '']) !!}
            {!! Form::text('surveyName', '', ['class' => 'form-control']) !!}

    		{!! Form::label('tag', 'Survey Tag:', ['class' => '']) !!}
            {!! Form::text('tag', '', ['class' => 'form-control']) !!}
    		
    		<label for="mailingLists">Mailing List(s): </label>
    		<select class="form-control" id="mailingLists" name="mailingLists">
    		</select>
    		
    		{!! Form::label('org', 'Organization:', ['class' => '']) !!}
    		{!! Form::select('org', array(
    			'WA' => 'Wealth Authority', 
    			'LOP' => 'League of Power',),
    			'', array('class' => 'form-control')) !!} 
    		<br>
    		
    		{!! Form::label('showLogo', 'Show Logo:', ['class' => '']) !!}
    		{!! Form::checkbox('showLogo', 'true') !!}
    		<br>	
    		
    		{!! Form::label('bgImage', 'Background Image:', ['class' => '']) !!}
    		{!! Form::select('bgImage', ['$survey->bgImages' => ''], '', array('class' => 'form-control')) !!}
    		or
    		{!! Form::file('bgImageFile') !!}
    
    	{!! Form::Close() !!}	
    	</p>
    
    	
    	<p id="questions">
    		<label for="question">New Question</label>
    		<input class="form-control" name="question" id="question" value="who?">
    		
    		<label for="question">or select from previous</label>
    		<select class="form-control" name="questions" id="questions" onchange="questionSelected()">
    			<option value="false">Select Question</option>
    		</select><br>
    		
    		<button class="btn" onclick="createQuestion()">Add</button>
    	</p>
    	
    	<p id="answersDiv">
    		<label for="answer">New Answer</label>
    		<input class="form-control" name="answer" id="answer" value="them">
    		
    		<label for="question">or select from previous</label>
    		<select class="form-control" name="answers" id="answers" onchange="answerSelected()">
    			<option value="false">Select Answer</option>
    		</select><br>
    		
    		<button class="btn" onclick="createAnswer()">Add</button>
    	</p>
        
        
    </div>
	
	
	
	<div id="survey-preview"  class="col-md-6 col-sm-6">
		<h3>Survey Preview</h3>
		<p id="surveyPreviewContainer">
			<ol id="questionsList">
			</ol>
		</p>
		<button class="btn" onclick="saveSurvey()">Save Survey</button>
	</div>
	
	<p id="debug" class="col-md-12 col-sm-12">
		<button onclick="saveQuestion()">Save Question</button>
    	<button onclick="saveAnswer()">Save Answer</button>
    </p>
    -->

@endsection