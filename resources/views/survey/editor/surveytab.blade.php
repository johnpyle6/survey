<!-- Survey Preview Tab -->
<div role="tabpanel" class="tab-pane active" id="survey-preview-tab">
	<div class="row">
    	<div class="col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
        	<p class="input-group">
        		<span class="input-group-addon" id="basic-addon">Survey Name</span>
        		<input type="text" class="form-control" name="survey-name" id="survey-name" aria-describedby="basic-addon">
        	</p>
        </div>  
        <div class="btn btn-default" onclick="tools.saveName()">
    		<span class="glyphicon glyphicon-floppy-disk"></span>
    	</div>  
    </div>
    <div id="toolbox" class="center-block">
    	<div id="toolbox-text" class="toolbox-item btn btn-default" >
    		<span class="glyphicon">T</span>
    	</div>
    	<div id="toolbox-image" class="toolbox-item btn btn-default" >
    		<span class="glyphicon glyphicon-picture"></span>
    	</div>
    	<div id="toolbox-date" class="toolbox-item btn btn-default" >
    		<span class="glyphicon glyphicon-calendar"></span>
    	</div>
    	<div id="toolbox-bg" class="btn btn-default" >
    		<span class="glyphicon background-btn" onclick="$('#bgModal').modal('toggle')"></span>
    	</div>
    	<div id="toolbox-bg" class="btn btn-default" >
    		<span class="glyphicon glyphicon-upload" onclick="$('#imageModal').modal('toggle')"></span>
    	</div>
    	<div id="toolbox-bg" class="btn btn-default" >
    		<span class="glyphicon glyphicon-list" onclick="$('#listModal').modal('toggle')"></span>
    	</div>
    </div>
    <div id="text-tools">	
    	<button id="footer-btn" class="btn btn-default" onclick="$('#footerModal').modal('toggle')">
    		Footer
    	</button>
    </div>

	<div id="page-background" class="col-med-8" style="background-image: url(/images/{{ $layout->bgimage }})">
    	<ul id="edit-survey" class="col-med-6">
    		@if ($layout->date)
        	<li><p style="text-align:center"><strong>{{ date('M d, Y') }}</strong></p></li>
    		@endif
    	
    		@for ($i = 0; $i < count($components); $i++)
            	    <li id="comp-{{ $i + 1 }}" componentid="new">
                        <div class="ed-comp"  id="ed-comp-{{ $i + 1 }}">
                            <textarea class="" id="ed-{{ $i + 1 }}">{!! $components[$i]->content !!}</textarea><br>
                            <button class="btn btn-primary" onclick="tools.save('{{ $i + 1 }}')">save</button>
                            <button class="btn" onclick="toggleEditor({{ $i + 1 }})">cancel</button>
                        </div>
                        <div class="ed-cont"  id="ed-cont-{{ $i + 1 }}">
                            <div class="btn btn-default editBtn" onclick="tools.remove({{ $components[$i]->id }})">
                                <span class="glyphicon glyphicon-trash"></span>
                            </div>&nbsp;
                            <div class="btn btn-default editBtn" onclick="toggleEditor({{ $i + 1 }})">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </div>
                            
                            <div id="container-{{ $i + 1 }}"  >{!! $components[$i]->content !!}</div>   
                        </div>
                    </li>
                    <script>
                    	CKEDITOR.replace('ed-{{ $i + 1 }}');
                    	toggleEditor({{ $i + 1  }});
                    </script>
    		@endfor
    		<li>
    			<ol id="qa-container">
    			@foreach ( $survey->questions as $question )
    				<li>
    					{{ $question->text }}
	                    <ul class="answers">
                            @foreach ( $question->answers as $answer )
                            <li class="answer input-group">
                                {!! $answer->text !!}
                            </li>
                            @endforeach
		                </ul>
        			</li>
    			@endforeach
    			</ol>
    		</li>
    	</ul>
	</div>
    <footer id="content-footer">
        @if ( $layout->footer == "wa")
            @include('survey.layouts.footer_wa')    
        @elseif ($layout->footer == "lop")
            @include('survey.layouts.footer_lop')
        @endif
    </footer>
</div>