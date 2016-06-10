<!-- Survey Preview Tab -->
<div role="tabpanel" class="tab-pane active" id="survey-preview-tab">

	<!-- Survey Name box and tag/save buttons -->
	<div class="row">
    	<div class="form-inline center-block" style="width: 370px;">
        	<p class="input-group form-group ">
        		<span class="input-group-addon" id="basic-addon">Survey Name</span>
        		<input type="text"
					   class="form-control"
					   name="survey-name"
					   id="survey-name"
					   aria-describedby="basic-addon"
					   value="{{ $survey->name }}">
        	</p>

			<div class="btn btn-default" onclick="tools.saveName()">
				<span class="glyphicon glyphicon-floppy-disk"></span>
			</div>
			<div class="btn btn-default tagSurvey">
				<span class="glyphicon glyphicon-tag tagSurvey"></span>
			</div>
		</div>
    </div>
	<!-- End 1st row -->

	<!-- Second row: tag list -->
	<div id="survey-tag-list" class="survey-tag-list" style="text-align: center">
		<em><strong>tags: </strong>{{ $survey->tags()->lists('name')->implode(', ') }}</em>
	</div>

	<!-- End Second row -->



    <div id="toolbox" class="center-block">
    	<div id="toolbox-text" class="toolbox-item btn btn-default" data-toggle="tooltip" data-placement="left" title="Text">
    		<span class="glyphicon" >T</span>
    	</div>
    	<div id="toolbox-image" class="toolbox-item btn btn-default" data-toggle="tooltip" data-placement="left" title="Image">
    		<span class="glyphicon glyphicon-picture"></span>
    	</div>
    	<div id="toolbox-date" class="toolbox-item btn btn-default"  data-toggle="tooltip" data-placement="left" title="Date" >
    		<span class="glyphicon glyphicon-calendar"></span>
    	</div>

		<div id="toolbox-footer" class="toolbox-item btn btn-default"  data-toggle="tooltip" data-placement="left" title="Footer" >
			<span class="glyphicon  glyphicon-download-alt"></span>
		</div>

    	<div id="toolbox-bg" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Set Background Color">
    		<span class="glyphicon background-btn" onclick="$('#bgModal').modal('toggle')"></span>
    	</div>
    	<div id="toolbox-bg" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Upload Image">
    		<span class="glyphicon glyphicon-upload" onclick="$('#imageModal').modal('toggle')"></span>
    	</div>
    </div>


	@forelse ($survey->content as $key => $content)
		@if (count( $content->tags->where('name', 'background') ) > 0)
			<style>
				#page-background {
					{{ $content->content }}
                }
			</style>
			<?php $survey->content->forget($key); ?>
		@endif

	@empty
	@endforelse

	<div id="page-background" class="col-med-8" style="background-image: url(/images/{{-- $layout->bgimage --}})">
    	<ul id="edit-survey" class="col-med-6">

				@foreach ($survey->content as $content)
				<li id="comp-{{ $content->id }}">
					<div class="content-edit-buttons" id="ed-cont-btns-{{ $content->id }}">
						<div class="btn btn-default editBtn" onclick="tools.detachContentFromSurvey({{ $content->id }})">
							<span class="glyphicon glyphicon-trash"></span>
						</div>&nbsp;
						<div class="btn btn-default editBtn tagContent" >
							<span class="glyphicon glyphicon-tag tagContent"></span>
						</div>
						<div class="btn btn-default editBtn" onclick="toggleEditor({{ $content->id }})">
							<span class="glyphicon glyphicon-pencil"></span>
						</div>
					</div>

					<div class="ed-comp"  id="ed-comp-{{ $content->id  }}">
						<textarea id="ed-{{ $content->id  }}">
							{!! $content->content !!}
						</textarea>
						<br>
						<button class="btn btn-primary" onclick="tools.editText('{{ $content->id }}')">
							save
						</button>
						<button class="btn" onclick="toggleEditor({{ $content->id }})">
							cancel
						</button>
					</div>

					<div class="ed-cont"  id="ed-cont-{{ $content->id }}">
						<div id="container-{{ $content->id  }}"  >
							{!! $content->content !!}
						</div>
					</div>


				</li>
				<script>
					CKEDITOR.replace('ed-{{ $content->id  }}');
					toggleEditor({{ $content->id  }});
				</script>
				@endforeach



    	</ul>
	</div>
</div>

<div style="display: none;" id="questions">
	<ol id="qa-container" contenteditable="false">
		@foreach ( $survey->surveyQuestions as $surveyQuestion )
			<li questionId="{{ $surveyQuestion->question_id }}" class="selected">
				{{ $surveyQuestion->question->text }}
				<ul class="answers">
					@foreach ( $surveyQuestion->surveyAnswers as $surveyAnswer )
						<li class="answer input-group">
							{!! $surveyAnswer->answer->text !!}
						</li>
					@endforeach
				</ul>
			</li>
		@endforeach
	</ol>
</div>