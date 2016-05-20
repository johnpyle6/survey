<!DOCTYPE html>
<html lang="eng">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>The Wealth Authority</title>
    <link rel="Shortcut icon" href="http://www.wealthauthority.com/wp-content/themes/the_wealth_authority/images/favicon.ico" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="/survey.js"></script>

    <script type="text/javascript">
	var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-24216112-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

    </script>
    <link rel="stylesheet" href="/survey-blade.css">

</head>
<body class="container-fluid" style="background-image: url(/images/{{ $survey->layout->bg_image_name }})">
    <div id="main" class="center-block">

        <header>
            <p class="header-top">
                {{ date('l, F j') }}
            </p>
            @section('header') 
	        <p>
                <span class="header-text-top">{{ $survey->layout->header_text_top }}</span><br>
                <img class="center-block img-responsive header-img" src="/images/{{ $survey->layout->header_image_name }}" alt=""><br>
            </p>
	        <div class="jumbotron">
	        	<h1 class="header-text-bottom">{{ $survey->layout->header_text_bottom }}</h1>
	        	<p class="header-text-bottom">
	        		<a class="btn btn-primary btn-lg" onclick="surveyScroll()">
	        			Vote in This Urgent Poll<br>
	        			<span class="scroll"><em>Scroll Down</em></span>
	        		</a>
	        	</p>
	        </div>
	        </p>
	        <p class="header-bottom">
	        	
	        </p>
        </header>

	        	
	        	
		@if ( count($errors) > 0 ) 
		<section class="alert alert-danger" role="alert">
			Please ensure you've answered all questions and provided your name and email
		</section>
		@endif

        <hr>

        <!-- SURVEY -->
        <section id="survey">
            {!! Form::open(['url' => 'survey/submit', 'class' => '', 'onsubmit' => 'return val()']) !!}
            

            @foreach ( $survey->questions as $question )
                @if ($survey->layout->qa_style == 'h')
                     <div class="col-md-6">
                @endif

	    	    {{ $question->qorder }}. {{ $question->text }}
	    	    <span class="error">*</span>
				<br>
				<span class="error-message">Please select an answer</span>

                @if ($survey->layout->qa_style == 'h')
                     </div>
                     <div class="col-md-6">
                @endif

                <ul class="answers">
                    @foreach ( $question->answers as $answer )
                    <li class="answer input-group">
                    	<span class="input-group-addon">
                        {!! Form::radio('question['.$question->qid.']', $answer->answer_id, false, ['id' => $question->qorder .'-'. $answer->answer_order ]) !!}
                        </span>
                        {!! Form::label($question->qorder .'-'. $answer->answer_order, $answer->text, ['class' => 'form-control']) !!}
                    </li>
                    @endforeach
                </ul>
                
                @if ($survey->layout->qa_style == 'h')
                </div>
                @endif

                <hr>
            @endforeach
            <p>
                Cast your vote, enter your email address. Invalid emails will not be counted!
			    After voting check your inbox to verify your vote and to get latest poll results.
            </p>

			<div class="input-container">
                <!-- text boxes and submit button -->
                <div class="signup-form input-group name-container">
                    {!! Form::label('firstName', 'First Name:', ['class' => 'signup input-group-addon']) !!}
                    {!! Form::text('firstName', '', ['class' => 'form-control', 'aria-describedby' => 'basic-addon3']) !!}
                </div>
                <div class="signup-form input-group email-container">
                    {!! Form::label('email', 'Email Address:', ['class' => 'signup input-group-addon']) !!}
                    {!! Form::text('email', '', ['class' => 'form-control']) !!}
                </div>
                <div class="signup-form">
                    {!! Form::hidden('tag', $survey->tag) !!}
                    {!! Form::hidden('list', '33921,33906') !!}
                    {!! Form::hidden('surveyId', $survey->id) !!}
                    {!! Form::submit('Submit My Poll', [ 'class' => 'btn btn-primary submit-btn', ]) !!}
                </div>
			</div>

            {!! Form::close() !!}
            <p class="disclaimer">
                <span class="note">Please Note:</span> In appreciation of casting your vote,
		        The Wealth Authority and American Liberty Report will keep you automatically
		        updated on poll results and other breaking news with <strong>FREE</strong>
                email alerts. If you wish to discontinue these updates, you are welcome to
		        unsubscribe at any time. Invalid email addresses will not be counted in this
		        poll. Your email address and personal information is confidential as stated
			    in our
                <a class="privacy-link" target="_blank" href="{{ $survey->layout->privacy_link }}">
                    Privacy Policy
                </a>
                . Thank you.
            </p>
        </section>

	    @if ($survey->layout->show_logo)
    		<section id="newhead">
    	       <img class="center-block img-responsive headerimg" src="/images/newhead.png" alt=""/>
    	    </section>
    	@endif

        <footer id="content-footer">
            @if ( $survey->layout->org == "WA")
                @include('survey.layouts.footer_wa')    
            @elseif ($survey->layout->org == "LOP")
                @include('survey.layouts.footer_lop')
            @endif
        </footer>
            
    </div>
</body>
</html>