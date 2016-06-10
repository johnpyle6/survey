<div role="tabpanel" class="tab-pane" id="qa-tab">
	<div class="row">
		<div class="col-md-6 col-sm-6">
			<h3>Avaliable Questions</h3>
			<ul class="existing-container" id="existing-questions"></ul>
			<button id="questions-btn" class="btn btn-default" onclick="$('#newQuestionModal').modal('toggle')">
				Add New Question
			</button>

		</div>

		<div class="col-md-6 col-sm-6">
			<h3>Available Answers</h3>
			<ul class="existing-container" id="existing-answers"></ul>
			<button id="answer-btn" class="btn btn-default" onclick="$('#newAnswerModal').modal('toggle')">
				Add New Answer
			</button>
		</div>
	</div>

	<div class="col-sm-offset-10" style="margin-top: 30px;">
		<button id="save-survey-btn" class="btn btn-default">
			Save Survey
		</button>
	</div>
	<div class=""style="margin-top: 10px;" >
		<ol id="qa-preview">
			@foreach ( $survey->surveyQuestions as $surveyQuestion )
				<li questionid="{{ $surveyQuestion->question_id }}" surveyquestionid="{{ $surveyQuestion->id }}">
					<button type="button" class="close" aria-label="Close">
    					<span aria-hidden="true" onclick="tools.deleteSurveyQuestion({{ $surveyQuestion->id }})">
							&times;
						</span>
                    </button>
					{{ $surveyQuestion->question->text }}
                    <ul id="q-{{ $surveyQuestion->question_order }}">
                        @foreach ( $surveyQuestion->surveyAnswers as $surveyAnswer )
                        <li class="preview-answer" answerid="{{ $surveyAnswer->answer_id }}" surveyanswerid="{{ $surveyAnswer->id }}">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true" onclick="tools.deleteSurveyAnswer({{ $surveyAnswer->id }}, {{ $surveyQuestion->id }})">
									&times;
								</span>
                            </button>
                            {!! $surveyAnswer->answer->text !!}
                        </li>
                        @endforeach
	                </ul>
    			</li>
			@endforeach
		</ol>
    </div>
</div>