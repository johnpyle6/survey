<div role="tabpanel" class="tab-pane" id="qa-tab">
	<div class="">
		<div class="col-md-6 col-sm-6" >
			<ol id="qa-preview">
			@foreach ( $survey->questions as $question )
				<li qid="{{ $question->qid }}" onclick="$('#qa-preview li').removeClass('selected');$(this).addClass('selected')">
					<button type="button" class="close" aria-label="Close">
    					<span aria-hidden="true" onclick="tools.deleteSurveyQuestion(this)">&times;</span> 
                    </button>
					{{ $question->text }}
                    <ul id="q-{{ $question->qorder }}">
                        @foreach ( $question->answers as $answer )
                        <li class="preview-answer" onclick="$('#qa-preview li').removeClass('btn-info');$(this).addClass('btn-info')" aid="{{ $answer->aid }}">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true" onclick="tools.deleteSurveyAnswer(this)">&times;</span> 
                            </button>
                            {!! $answer->text !!}
                        </li>
                        @endforeach
	                </ul>
    			</li>
			@endforeach
			</ol>
		</div>
		<div class="col-md-6 col-sm-6">
		
    		<div id="text-tools" class="">	
            	<button id="questions-btn" class="btn btn-default" onclick="$('#newQuestionModal').modal('toggle')">
            		Add New Question
            	</button>
            	<button id="answer-btn" class="btn btn-default" onclick="$('#newAnswerModal').modal('toggle')">
            		Add New Answer
            	</button>
            </div>

			<h3>Avaliable Questions</h3>                
        	<ul class="existing-container" id="existing-questions">
        		@foreach ($questions as $question)
        		<li qid="{!! $question->id !!}" class="btn btn-default">
        			{!! $question->question !!}
        		</li>
        		<br>
        		@endforeach
			</ul>
        
        	<h3>Available Answers</h3>
        	<ul class="existing-container" id="existing-answers">
        		@foreach ($answers as $answer)
        		<li aid="{!! $answer->id !!}" class="btn btn-default">
        			{!! $answer->text !!}
        		</li>
        		<br>
        		@endforeach
			</ul>
        </div>
    </div>
</div>