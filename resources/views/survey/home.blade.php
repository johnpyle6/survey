@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Surveys</div>

                <div class="panel-body">
                    
                    <div class="col-md-3 col-md-offset-1 col-sm-3 col-sm-offset-1">
                    	<a class="btn btn-primary" href="/survey/edit/new">
                    		Create New Survey
                    	</a>
                    </div>
                    <div class="col-md-5 col-md-offset-3 col-sm-5 col-sm-offset-3">
                    	<div class="input-group">
                    		<div class="input-group-btn">
                    			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    				Edit Existing Survey
                    				<span class="caret"></span>
                    			</button>
                    			<ul class="dropdown-menu">
                    				@foreach ($surveys as $survey)
                    				<li><a href="/survey/edit/{{ $survey->id }}">{{ $survey->name }}</a></li>
                    				@endforeach
                    			</ul>
                    		</div>
                    	</div>
                    </div>
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection