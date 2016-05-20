function radioVal(){
    $('.error-message').hide();
    var errors = false;
    $('.answers').each(function(i, e){ 
         if ( $(e).find(':checked').length == 0 ){
             $(e).prev('.error-message').show();
             errors = true;
         } 
    })   
    return errors;
}

function nameVal(){
    
}

function emailVal(){
    
}

function val(){
    var errors = false;
    errors = radioVal();
    
    re = new RegExp(/^[\W\d]$/);
    if (re.test( $('#firstName').val() ) || $('#firstName').val().length == 0){
        $('.name-container').addClass("has-error");
        errors = true;
    }else{
        $('.name-container').removeClass("has-error");
    }
    
    re = new RegExp(/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b./);
    if (re.test( $('#email').val() ) || $('#email').val().length == 0){
        $('.email-container').addClass('has-error');
        errors = true;
    }else{
        $('.email-container').removeClass('has-error');
    }
    
    if (errors){
        surveyScroll();
        return false;
    } 
    return true;
    
}

function surveyScroll() {
    
    $('html, body').animate({
        scrollTop: $("#survey").offset().top
    }, 1000);
};