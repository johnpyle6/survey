<!DOCTYPE html>
<html lang="eng">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>The Wealth Authority</title>
    <link rel="Shortcut icon" href="http://www.wealthauthority.com/wp-content/themes/the_wealth_authority/images/favicon.ico" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link rel="Shortcut icon" href="http://www.wealthauthority.com/wp-content/themes/the_wealth_authority/images/favicon.ico" />    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">

	var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-24216112-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	  


/*
	  
	  $( window ).on('beforeunload', (function() {
		setTimeout(function() {
	    	document.location.href = 'https://ts970.isrefer.com/go/rfid/afPaCof/';
	    }, 500);
	        
        	  return 'WAIT BEFORE YOU GO! CLICK The "Stay on this page" Button Or The “CANCEL” Button Right Now! ' + 
              'I\'d like to mail you a Free Safe Wallet Shield.  It will help protect your new chip enabled credit ' +
              'cards against thieve and hackers GET Your Free Safe Wallet Shield Here!';
	    }));
	*/    

	</script>
    <link rel="stylesheet" href="/thank-you.css">
    
</head>
<body class="container-fluid" style="background-image: url(/images/{{ $survey->layout->bg_image_name }});">



    <div id="main" class="center-block">
    	<h3 class="thankyou">
    		Thank You for Completing the Survey. The Results Will Be Sent to Your 
		   	Email Address in Just a Few Moments.
		  	<br>
		  	<br>  
		  	In the Meantime, Please Check Out These Important Messages
		  	<br> 
		  	(Which Include Some Free Gifts)
		</h3>
		
		<!-- include retirement for survey 1 -->
		@foreach($survey->ads1 as $ad)
			@include('survey.ads.' . $ad->template_name)
			<hr>
		@endforeach
		
		@if (count($survey->ads2) > 0)
		<section id="re" class="container-fluid">
		@foreach($survey->ads2 as $ad)
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

<script>

</script>
	
<script language="javascript">
(function() {
    setTimeout(function() {
    var __redirect_to = 'https://ts970.isrefer.com/go/rfid/afPaCof/';//

    var _tags = ['button', 'input', 'a'], _els, _i, _i2;
    for(_i in _tags) {
        _els = document.getElementsByTagName(_tags[_i]);
        for(_i2 in _els) {
            if((_tags[_i] == 'input' && _els[_i2].type != 'button' && _els[_i2].type != 'submit' && _els[_i2].type != 'image') || _els[_i2].target == '_blank') continue;
            _els[_i2].onclick = function() {window.onbeforeunload = function(){};}
        }
   }

    window.onbeforeunload = function() {
        setTimeout(function() {
            window.onbeforeunload = function() {};
            setTimeout(function() {
                document.location.href = __redirect_to;
            }, 500);
        },5);
        return 'WAIT BEFORE YOU GO! CLICK The "Stay on this page" Button Or The "CANCEL" Button Right Now! I\'d like to mail you a Free Safe Wallet Shield.  It will help protect your new chip enabled credit cards against thieve and hackers GET Your Free Safe Wallet Shield Here!';
    }
    }, 500);
})();
</script>
	
	
</body>

</html>
		