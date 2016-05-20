
function dropText(){
    var id = $('#edit-survey').children("li").length +1;
    
    $('#edit-survey').append(
        '<li id="comp-' + id + '" componentid="new">' +
            '<div class="ed-comp" id="ed-comp-' + id + '">' +
                '<textarea class="" id="ed-' + id + '"></textarea><br>' +
                '<button class="btn btn-primary" onclick="tools.save(' + id + ')">save</button> ' +
                '<button class="btn" onclick="toggleEditor(' + id + ')">cancel</button> ' +
            '</div>' +
            '<div class="ed-cont" id="ed-cont-' + id + '">' +
                '<div class="btn btn-default editBtn" onclick="removeEd(\'comp-' + id + '\')">' +
                    '<span class="glyphicon glyphicon-trash"></span>' +
                '</div>&nbsp;' +
                '<div class="btn btn-default editBtn" onclick="toggleEditor(' + id + ')">' +
                    '<span class="glyphicon glyphicon-pencil"></span>' +
                '</div>' +
                
                '<div id="container-' + id + '"  ></div>' +   
            '</div>' +
        '</li>');
    CKEDITOR.replace('ed-' + id);
}

function saveReorder(){
    $('#edit-survey').children("li").each(function(i,e){
       console.debug( $(e).attr("componentid") );
       // REST call here
    });
}

function toggleEditor(id){
    $('#ed-comp-' + id).toggle();
    $('#ed-cont-' + id).toggle();
}



function removeEd(cid){
    $('#' + cid).remove();
}

function makeToolboxItem(type){
    var item = '<div id="' + type + '" class="toolbox-item btn btn-default" >';
    if (type == 'toolbox-text'){
        item += '<span class="glyphoicon">T';
    }else if(type == 'toolbox-image'){
        item += '<span class="glyphicon glyphicon-picture">';
    }else if (type == 'toolbox-date'){
        item += '<span class="glyphicon glyphicon-calendar">';
    }
    item += '</span></div>';
    
    return item;
}

function imgSelect(ele){
    $('.imgSelected').removeClass('imgSelected');
    $(ele).addClass('imgSelected');
}

function insertImg(){
    if ( $('#image-form').children("input#image").val() == ''){
        var id = $('#edit-survey').children().length;
        
        $('#edit-survey').append(
            '<li id="comp-' + id + '">' +
                '<p>' +
                    '<img class="center-block img-responsive header-img" src="/images/trump.jpg" alt="">' +
                '</p>' +
            '</li>'
        );
            
        var imgid = $('a.imgSelected').children('img').attr('imgid');    
    }else{
        $('#image-form').submit();
    }
}

function selectColor(color){
    $('#bg-color').val(color);
}

function saveBackground(ele){
    //console.debug( $('.tab-content').children('.active').attr('id') )
    var id = $('.tab-content').children('.active').attr('id');
    if (id == 'bg-image-selector'){
        /*var imgid = $('a.imgSelected').children('img').attr('imgid');
        var src = $('a.imgSelected').children('img').attr('src');
        $('#page-background')
            .css('background', 'transparent url(' + src + ') no-repeat 0 0')
            .css('background-size', '100%');
        */
        tools.saveBgImage();
    }else if (id == 'bg-color-selector'){
        var color = $('#bg-color').val();
        $('#page-background')
            .css('background-color', color);
    }
    
    
}











var tools = {
    save : function (id){
        var code = CKEDITOR.instances['ed-' + id].document.getBody().getHtml();
        var componentid = $('li#comp-' + id).attr('componentid');
        if (componentid == 'new'){
            var url = '/survey/rest/saveComponent' 
        }else {
            var url = '/survey/rest/editComponent'
        }
        
        $.ajax({
            type: "POST",
            url: url,
            data: { 
                'html' : code, 
                'id' : componentid,
                'survey_id' : window.location.pathname.split('/').pop(),
                'order' : $('#edit-survey').children("li").length
            },
            success: function(data){
                console.debug(data.id);
                $('li#comp-' + id).attr('componentid', data.id);
                
                $('#container-' + id).html(code);
                toggleEditor( $('#edit-survey').children("li").length );
            },
            error: function(req, stat, err){
                console.debug(req);
                console.debug(stat);
                console.debug(err);
            },
            dataType: 'json'
          });
        
        
        
    },
    saveDate : function(){
        $.ajax({
            type: "POST",
            url: '/survey/rest/saveComponent',
            data: { 
                'id' : 1,
                'survey_id' : window.location.pathname.split('/').pop(),
                'order' : $('#edit-survey').children().length
            },
            success: function(data){
                window.location.reload();
            },
            error: function(req, stat, err){
                console.debug(stat);
                console.debug(err);
            },
            dataType: 'json'
        });
    },
    
    saveBgImage: function(){
        var id = $('a.imgSelected').children('img').attr('imgid');

        $.ajax({
            type: "POST",
            url: '/survey/rest/saveBgImage',
            data: { 
                'bg_image_id' : id,
                'survey_id' : window.location.pathname.split('/').pop(),
                
            },
            success: function(data){
                window.location.reload();
            },
            error: function(req, stat, err){
                console.debug(stat);
                console.debug(err);
            },
            dataType: 'json'
        });

    },

    remove: function(id){

        $.ajax({
            type: "POST",
            url: '/survey/rest/remove',
            data: { 
                'id' : id,
                'survey_id' : window.location.pathname.split('/').pop(),
                
            },
            success: function(data){
                window.location.reload();
            },
            error: function(req, stat, err){
                console.debug(stat);
                console.debug(err);
            },
            dataType: 'json'
        });
    },
    
    addFooter: function(){
        org = $('input[name="footer"]:checked').val();
        console.debug(org);
        $.ajax({
            type: "POST",
            url: '/survey/rest/saveFooter',
            data: { 
                'footer' : org,
                'survey_id' : window.location.pathname.split('/').pop(),
                
            },
            success: function(data){
                console.debug(data);
                //window.location.reload();
            },
            error: function(req, stat, err){
                console.debug(req);
                console.debug(stat);
                console.debug(err);
            },
            dataType: 'json'
        });
    },
        
    addNewQuestion : function(){
        var code = CKEDITOR.instances['ed-new-question'].document.getBody().getHtml();
       
        
        $.post(
            "/survey/rest/saveQuestion",
            { text: code }
        ).done(function(data){
            console.debug(data);
            
            $('ul#existing-questions').prepend(
                '<li class="btn btn-default">' +
                code +
                '</li>'
            );
            
        }).fail(function(data){
            console.debug(data);
        });
    },   
    
    addNewAnswer : function(){
        var code = CKEDITOR.instances['ed-new-answer'].document.getBody().getHtml();
        
        $.post(
            "/survey/rest/saveAnswer",
            { text: code }
        ).done(function(data){
            console.debug(data);
            
            $('ul#existing-answers').prepend(
                '<li class="btn btn-default">' +
                code +
                '</li>'
            );
        }).fail(function(data){
            console.debug(data);
        });
    },
    
    addSurveyQA : function(qid, qorder, aid, aorder){
        var data =  {   'qid': qid, 
                'qorder': qorder, 
                'aid': aid, 
                'aorder': aorder, 
                'survey_id' : window.location.pathname.split('/').pop(), 
            };
        
        console.debug(data);
        
        $.post(
            "/survey/rest/saveSurveyQA",
          data  
        ).done(function(data){
            console.debug('no-problem');
            console.debug(data);
            $('#qa-container').html( $('#qa-preview').html() );    
            $('#qa-container button').remove()
        }).fail(function(data){
            console.debug('problem');
            console.debug(data);
        });
        
    },
    
    saveAllQuestions : function(){
        $.post(
            "/survey/rest/deleteSurveyQA",
            { 'survey_id' : window.location.pathname.split('/').pop() }  
        ).done(function(data){
            console.debug(data);
            $('#qa-preview').children().each(function(i,e){
                $(e).children('ul').children('li').each(function(ii, ee){
                    var qid = $(e).attr('qid');
                    var qorder = i + 1;
                    
                    var aid = $(ee).attr('aid');
                    var aorder = ii + 1;
                    tools.addSurveyQA(qid, qorder, aid, aorder);
                    console.debug(qid + " " + qorder + " " + aid + " " + aorder);
                    
                    $('#qa-container').html( $('#qa-preview').html() );
                    $('#qa-container button').remove()
                });
            });
        }).fail(function(data){
            console.debug(data);
        });

        
        
        
    },
    
    deleteSurveyAnswer : function(ele){
        e = ele;
        var aid = $(ele).parent().parent().attr('aid');
        var qid = $(ele).parent().parent().parent().parent().attr('qid');
        
        console.debug(aid + ' ' + qid);
        $.post(
                "/survey/rest/deleteSurveyAnswer",
                { 'survey_id' : window.location.pathname.split('/').pop(),
                  'aid' : aid,
                  'qid' : qid
                }  
            ).done(function(data){
                console.debug(data);
                tools.saveAllQuestions();
            }).fail(function(data){
                console.debug(data);
            });
        $(ele).parent().parent().remove();
    },
    
    deleteSurveyQuestion : function(ele){
        e = ele;
        var qid = $(ele).parent().parent().attr('qid');
        
        console.debug(qid);
        $.post(
                "/survey/rest/deleteSurveyAnswer",
                { 'survey_id' : window.location.pathname.split('/').pop(),
                  'aid' : '%',
                  'qid' : qid
                }  
            ).done(function(data){
                console.debug(data);
            }).fail(function(data){
                console.debug(data);
            });
        $(ele).parent().parent().remove();
    },
    
    saveLists : function(){
        var lists = [];
        $('#list-chooser label.btn.active').children().each(function(i,e){
            lists.push($(e).val());
        });
        
        lists = lists.join(",");
        $.post(
            "/survey/rest/saveLists",
            { 'survey_id' : window.location.pathname.split('/').pop(),
              'lists' : lists
            }  
        ).done(function(data){

        }).fail(function(data){
            console.debug(data);
        });
    },
    
    saveName : function(){
        var name = $('#survey-name').val()
        $.post(
            "/survey/rest/saveName",
            { 'survey_id' : window.location.pathname.split('/').pop(),
              'name' : name
            }  
        ).done(function(data){

        }).fail(function(data){
            console.debug(data);
        });
    },
    
    insertAd : function(){
        $('#').append('<li><div>' + $('.ad-preview.selected').html() + '</div></li>');
        
        $.post(
            "/survey/rest/insertAd",
            { 'survey_id' : window.location.pathname.split('/').pop(),
              'adid' : $('#').val()
            }  
        ).done(function(data){

        }).fail(function(data){
            console.debug(data);
        });
    }
    
        
};



$(document).ready( function(){
    $('.toolbox-item').draggable();
    $('.existing-container li').draggable( { helper: 'clone' });
    $('#qa-preview').sortable({
        update: function (event, ui){
            tools.saveAllQuestions();
        }            
    });
    $('#qa-preview').children().first().addClass('selected');
    
    $( "#edit-survey" ).droppable({
        accept: ".toolbox-item",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function( event, ui ) {
            var id = ui.draggable.attr('id');
            if (id == 'toolbox-text'){
                dropText();    
            }else if (id == 'toolbox-image'){
                $('#bgImageModal').modal('toggle');    
            }else if (id == 'toolbox-date'){
                tools.saveDate(0);
                
            }
              
            var next = $('#' + id).next();
            ui.draggable.remove();
            next.before( makeToolboxItem(id) );
            $('.toolbox-item').draggable();
                     
        }
      });
    
    $( "#qa-preview" ).droppable({
        accept: ".existing-container li",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: function( event, ui ) {
            if (ui.draggable.parent().attr('id') == 'existing-questions'){
                var questionId = ui.draggable.attr('qid');
                $('#qa-preview li').removeClass('selected');
                $('li.preview-answer').removeClass('btn-info');
                
                $('#qa-preview').append("" +
                    '<li qid="' + questionId + '" onclick="$(\'#qa-preview li\').removeClass(\'selected\');$(this).addClass(\'selected\')" class="selected">' +
                        '<button type="button" class="close" aria-label="Close">' +
                            '<span aria-hidden="true" onclick="tools.deleteSurveyQuestion(this)">&times;</span>' + 
                        '</button>' +
                        ui.draggable.html() +
                        '<ul id="q-' + ($('qa-preview').children("li").length + 1) + '">' +
                    '</li>');
                $( "#qa-preview li" ).disableSelection();
                $('#qa-preview').sortable({
                    update: function (event, ui){
                        tools.saveAllQuestions();
                    }            
                });
                ui.draggable.remove();
            }else if (ui.draggable.parent().attr('id') == 'existing-answers'){
                if ( $('#qa-preview li.selected').length > 0 ){
                    var questionId = $('#qa-preview li.selected').attr('qid');
                    var answerId = ui.draggable.attr('aid');
                    $('li.preview-answer').removeClass('btn-info');
                    
                    $('#qa-preview li.selected ul').append(
                            '<li class="preview-answer" onclick="$(\'#qa-preview li\').removeClass(\'btn-info\');$(this).addClass(\'btn-info\')" aid="' + answerId + '">' +
                                '<button type="button" class="close" aria-label="Close">' +
                                    '<span aria-hidden="true" onclick="tools.deleteSurveyAnswer(this)">&times;</span>' + 
                                '</button>' +
                                ui.draggable.html() + 
                            '</li>');
                    
                    var qorder = 0;
                    $('#qa-preview').children("li").each(function(i,e){
                        if ($(e).hasClass('selected')){
                            qorder = i + 1;
                        }    
                    });
                    
                    var aorder = $('#qa-preview li.selected ul').children("li").length;
                    tools.addSurveyQA(questionId, qorder, answerId, aorder);
                }
                
            }
            
            
        }
      });
    
    
    
    $( "#edit-survey" ).sortable({
        update: function (event, ui){
            //alert();
        }            
    });
    
    $( "#edit-survey" ).disableSelection();
    $( "#edit-survey li>*" ).disableSelection();
    $( "#qa-preview li>*" ).disableSelection();
})















/*


function createQuestion(){
    var questionText = $('#question').val();
    var questionNumber = $('#questionsList').children().length + 1;
    var id = 'id="q' + questionNumber + '"'; 
    var li = $('#questionsList')
        .append('<li ' + id + '>' + questionText + '<ul class="answers"></ul></li>' );
    
 
    
    
}

function createAnswer(){
    
    var answerText = $('#answer').val();
    var questionNumber = $('#questionsList').children().length;
    var answerNumber = $('#q' + questionNumber + ' .answers').children().length;
    var id = 'id="a' + answerNumber + '"';
    
    var li = $('#q' + questionNumber + ' .answers').append(
         '<li ' + id + '>' + 
         '<input type="radio"> ' +
         '<label>' + answerText + '</label>' + 
         '</li>' 
    );
    
        $( '#q' + questionNumber + ' .answers').sortable();
        $( '#q' + questionNumber + ' .answers').disableSelection();
    
}



function saveAnswer(){
    var text = $('#answer').val();
    
    $.post(
        "/survey/saveAnswer",
        { text: text}
    ).done(function(data){
        console.debug(data);
        var option = '<option value="' + data + '">' + text + '</option>';        
        $('#answers').append(option)
    });
}


function getAnswers(){
    $.get(
        "/survey/getAnswers", 
        function( data ){
            console.debug(data);
            $.each(data, function(i,d){
                var option = '<option value="' + d.id + '">' +
                    d.text +
                    '</option>';
                $('#answers').append(option)
            })
        },
        'json'
            
    );
}


function answerSelected(){
    $('#answer').val( 
        $('#answers')
        .children()[ $('#answers').val() - 1 ]
        .text
    );
}


function getMailingLists(){
    $.ajax({
        url: "/survey/getMailingLists",
        dataType: 'json',
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        },
        success: function( data ){
            console.debug(data);
            $.each(data, function(i,d){
                var option = '<option value="' + d.key + '">' +
                    d.listName +
                    '</option>';
                $('#mailingLists').append(option)
            })
        }
            
    });
}


*/