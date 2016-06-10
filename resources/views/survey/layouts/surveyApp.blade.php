<!DOCTYPE html>
<html lang="eng">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>{{ $survey->name }}</title>
    <link rel="Shortcut icon" href="http://www.wealthauthority.com/wp-content/themes/the_wealth_authority/images/favicon.ico" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/survey.js"></script>


    <link rel="stylesheet" href="/survey-blade.css">

</head>
<body class="container-fluid" style="background-image: url(/images/{{-- $survey->bgImageName() --}})">
    <div id="main" class="center-block">

        @if ( count($errors) > 0 )
            <section class="alert alert-danger" role="alert">
                Please ensure you've answered all questions and provided your name and email
            </section>
        @endif

        <hr>




        <!------------------------------------------------------------------------------------------
                                           SURVEY
        -------------------------------------------------------------------------------------------->
        <section id="survey">
            {!! Form::open(['url' => 'survey/submit', 'class' => '', 'onsubmit' => 'return val()']) !!}


            @foreach ( $survey->surveyQuestions as $question )
                                                                                            {{-- @if ($survey->layout->qa_style == 'h') --}}
                    <div class="col-md-6">
                                                                                            {{-- @endif --}}

                        {{ $question->question_order }}. {{ $question->question->text }}
                        <span class="error">*</span>
                        <br>
                        <span class="error-message">Please select an answer</span>

                        {{--@if ($survey->layout->qa_style == 'h') --}}
                    </div>


                    <div class="col-md-6">
                        {{--@endif--}}

                        <ul class="answers">
                            @foreach ( $question->surveyAnswers as $answer )
                                <li class="answer input-group">
                                    <span class="input-group-addon">
                                    {!! Form::radio('question['.$question->question_id.']', $answer->answer_id, false,['id' => $question->question_order .'-'. $answer->answer_order ] ) !!}
                                    </span>
                                    {!! Form::label($question->question_order .'-'. $answer->answer_order, $answer->answer->text, ['class' => 'form-control']) !!}
                                </li>
                            @endforeach
                        </ul>

                        {{-- @if ($survey->layout->qa_style == 'h') --}}
                    </div>
               {{-- @endif --}}

                <hr>
            @endforeach

            {{--

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
            --}}
    </div>
</body>
</html>