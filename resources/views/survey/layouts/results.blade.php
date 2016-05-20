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
    <link rel="stylesheet" href="/results.css">
    
    
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
	        			View Live Stats<br>
	        			<span class="scroll"><em>Scroll Down</em></span>
	        		</a>
	        	</p>
	        </div>
	        </p>
	        <p class="header-bottom">
	        	
	        </p>
        </header>

	    <hr>
        
	    <section id="survey">
    	    @foreach ($survey->questions as $question)
    	    	{{ $question->qorder}}. {{$question->text}}
    	    	<ul>
    	    	@foreach ($question->answers as $answer)
    	            <li>{{$answer->text}}: <strong>{{ $answer->percentage }}% ({{ $answer->votes }} votes)</strong></li>
    	        @endforeach
    	        </ul>
    	    @endforeach
	    </section>


	    
	    @if (count($survey->ads) > 0)
		<section id="re" class="container-fluid">
		@foreach($survey->ads as $ad)
			@include('survey.ads.' . $ad->template_name)
		@endforeach
		</section>
		@endif	
			
		
		
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
