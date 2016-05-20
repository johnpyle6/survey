<!DOCTYPE html>
<html lang="eng">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>The Wealth Authority</title>
    <link rel="Shortcut icon" href="http://www.wealthauthority.com/wp-content/themes/the_wealth_authority/images/favicon.ico" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    
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

	</script>
    <link rel="stylesheet" href="/survey.css">
    
</head>
<body class="container-fluid">
    <div id="main" class="center-block">


	    <section id="content-header">
	    	<p id="date"><?php echo date('l, F j')?> </p>
	        <p>
	           <span class="jobs">Your Jobs... Your Retirement... Your Vote...</span><br>
	           <img class="center-block img-responsive" src="/images/trump2.jpg" alt=""><br>
	           <span class="trump">Will Donald Trump <br>Ruin or Save the Economy?</span>
	        </p>
	        <p class="vote">
	        	Vote in This Urgent Poll<br>
	        	<span><em>Scroll Down</em></span>
	        </p>
	    </section>

	    <hr>
	   
        
	    <section id="survey">
	    <form name="suvery-form" id="survey-form" method="POST" action="/survey/saveResponse">
	        1) Which Presidential candidate is best for the overall economy?
	        <ul>
	            <li>
	               <input type="radio" name="question[1]" value="1" id="clinton1"> 
	               <label for="clinton1">Hillary Clinton</label>
	            </li>
	            <li>
	               <input type="radio" name="question[1]" value="5" id="trump1"> 
                   <label for="trump1">Donald Trump</label>
                </li>
	        </ul>
	        <hr>
	        2) Which Presidential candidate is most likely to hurt the economy if they win?
	        <ul>
	            <li>
                   <input type="radio" name="question[2]" value="1" id="clinton2"> 
                   <label for="clinton2">Hillary Clinton</label>
                </li>
                <li>
                   <input type="radio" name="question[2]" value="5" id="trump2"> 
                   <label for="trump2">Donald Trump</label>
                </li>
	        </ul>
	        <hr>
			3) Your stock market portfolio is most likely to rise if this candidate is elected... 
			<ul>
                <li>
                   <input type="radio" name="question[3]" value="1" id="clinton3"> 
                   <label for="clinton3">Hillary Clinton</label>
                </li>
                <li>
                   <input type="radio" name="question[3]" value="5" id="trump3"> 
                   <label for="trump3">Donald Trump</label>
                </li>
            </ul>
			<hr>
			4) I believe this candidate will create the most jobs while in office... 
			<ul>
	            <li>
                   <input type="radio" name="question[4]" value="1" id="clinton4"> 
                   <label for="clinton4">Hillary Clinton</label>
                </li>
                <li>
                   <input type="radio" name="question[4]" value="5" id="trump4"> 
                   <label for="trump4">Donald Trump</label>
                </li>
	        </ul>
			<hr>
			5) Regardless of party affiliation who do you think will win the 2016 election for President?
	        <ul>
	            <li>
                   <input type="radio" name="question[5]" value="1" id="clinton5"> 
                   <label for="clinton5">Hillary Clinton</label>
                </li>
                <li>
                   <input type="radio" name="question[5]" value="5" id="trump5"> 
                   <label for="trump5">Donald Trump</label>
                </li>
	        </ul>
	        <hr>
			6) Do you believe that a stock market crash is possible in the next 18 months?
	        <ul>
	            <li>
                   <input type="radio" name="question[6]" value="6" id="yes"> 
                   <label for="yes">Yes</label>
                </li>
                <li>
                   <input type="radio" name="question[6]" value="7" id="no">
                   <label for="no">No</label>
                </li>
	        </ul>
	        <hr>						
			<p>Cast your vote, enter your email address. Invalid emails will not be counted! 
			After voting check your inbox to verify your vote and to get latest poll results.
			</p>
		    <p class="disclaimer">
		        <span class="note">Please Note:</span> In appreciation of casting your vote, 
		        The Wealth Authority and American Liberty Report will keep you automatically 
		        updated on poll results and other breaking news with <strong>FREE</strong> 
		        email alerts. If you wish to discontinue these updates, you are welcome to 
		        unsubscribe at any time. Invalid email addresses will not be counted in this 
		        poll. Your email address and personal information is confidential as stated 
			    in our <a class="privacy-link" target="_blank" href="http://www.wealthauthority.com/privacy-policy/">
			    Privacy Policy</a>. Thank you.
            </p>
	        <p class="signup-form">
	            <label class="signup" for="first">First Name: </label>
	            <input name="firstName" id="first" value="" type="text" /><br>
				
				<label class="signup" for="email">Email Address: </label>
				<input name="email" value="" id="email" type="text" /><br>
				
				<input type="hidden" name="tag" value="{{$tag_id}}" />
                <input type="hidden" name="nlbox[]" value="33" />
                <input type="hidden" name="nlbox[]" value="34" />
                <input type="hidden" name="surveyId" value="2" />
                <input class="btn btn-default" type="submit" value="Submit My Poll" />
		    </p>
	    </form>
	    </section>
	    
	    
	    
	    <!-- CUT/COPY THIS <header> to move the ALR/WA images to bottom, etc  -->
	    <section id="newhead">
	       <img class="center-block img-responsive headerimg" src="/images/newhead.png" alt=""/>
	    </section>
        <!-- END CUT/COPY -->	
	    
	    
	    <footer>
	    	<a class="footer-link" target="_blank" href="http://www.wealthauthority.com/privacy-policy/">
		       Website Terms Conditions, Privacy &amp; Anti-Spam Policy
		    </a>
		    <br>
		    Wealth Authority, LLC. 5036 Dr. Phillips Blvd. #213 Orlando, FL. 32819<br />
		    Email: <a href="mailto:info@wealthauthority.com">info@wealthauthority.com</a>
		    Office: 407-574-5285 M-F 9am-5pm EST.<br>
			All rights reserved. Use authorized by written permission only.
		</footer>
	</div>
	
</body>

</html>
