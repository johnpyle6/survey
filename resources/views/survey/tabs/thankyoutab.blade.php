<div role="tabpanel" class="tab-pane" id="thank-you-tab">
    <div id="toolbox" class="center-block">
    	<div id="toolbox-text" class="toolbox-item btn btn-default" title="Text>
    		<span class="glyphicon">T</span>
    	</div>
    	<div id="toolbox-image" class="toolbox-item btn btn-default" title="Image">
    		<span class="glyphicon glyphicon-picture"></span>
    	</div>
    	<div id="toolbox-date" class="toolbox-item btn btn-default" title="Date">
    		<span class="glyphicon glyphicon-calendar"></span>
    	</div>
    	<div id="toolbox-bg" class="btn btn-default" title="Set Background">
    		<span class="glyphicon background-btn" onclick="$('#bgModal').modal('toggle')"></span>
    	</div>
    	<div id="toolbox-bg" class="btn btn-default" title="Upload Image">
    		<span class="glyphicon glyphicon-upload" onclick="$('#imageModal').modal('toggle')"></span>
    	</div>

    </div>




    <div id="page-background" class="col-med-8" style="background-image: url(/images/{{-- $layout->bgimage --}})">
    	<ul id="edit-survey" class="col-med-6">
    		{{--@if ($layout->date)
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
    		--}}
    	</ul>

    	
    	
    </div>
</div>
