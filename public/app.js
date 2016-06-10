


function toggleEditor(id){
    $('#ed-comp-' + id).toggle();
    $('#ed-cont-' + id).toggle();
    $('#ed-cont-btns-' + id).toggle();
}

function makeToolboxItem(type){
    var item = '<div id="' + type + '" class="toolbox-item btn btn-default" data-toggle="tooltip" data-placement="left" ';
    if (type == 'toolbox-text'){
        item += 'title="Text"><span class="glyphoicon">T';
    }else if(type == 'toolbox-image'){
        item += ' title="Image"><span class="glyphicon glyphicon-picture">';
    }else if (type == 'toolbox-date'){
        item += 'title="Date"><span class="glyphicon glyphicon-calendar">';
    }else if (type == 'toolbox-footer'){
        item += 'title="Footer"><span class="glyphicon glyphicon-download-alt">';
    }
    item += '</span></div>';
    
    return item;
}

function imgSelect(ele){
    $('.imgSelected').removeClass('imgSelected');
    $(ele).addClass('imgSelected');
}


function selectColor(color){
    $('#bg-color').val(color);
}













var tools = {
    dropHandler : function(event, ui ) {
        var id = ui.draggable.attr('id');
        if (id == 'toolbox-text'){
            tools.insertText();

        }else if (id == 'toolbox-image'){
            $('#bgImageModal').modal('toggle');

        }else if (id == 'toolbox-date'){
            tools.insertDate();

        }else if (id == 'toolbox-footer'){
            tools.insertFooter();
        }

        var next = $('#' + id).next();
        ui.draggable.remove();
        next.before( makeToolboxItem(id) );
        $('.toolbox-item').draggable();
        $('[data-toggle="tooltip"]').tooltip();

    },



    insertNewCKEditor : function(id, role){
        var editSurvey = $('#edit-survey');

        var template = $('#editor-template').clone()
        template
            .attr('id',"comp-" + id).attr('role', role)
                .children('#editor-template-div1')
                    .attr('id', "ed-comp-" + id )
                    .children('textarea')
                        .attr('id', "ed-" + id )
                    .siblings('#editor-save-btn')
                        .attr('onclick' , "tools.editText('" + id + "')")
                    .siblings('#editor-cancel-btn')
                        .attr("onclick", "toggleEditor('" + id + "')")
                .parent().siblings('#editor-template-div2')
                    .attr('id', "ed-cont-" + id )
                    .children('#editor-delete-btn')
                        .attr('onclick', "tools.detachContentFromSurvey('" + id + "')")
                    .siblings('#editor-edit-btn')
                        .attr('onclick', "toggleEditor('" + id + "')")
                    .siblings('#container')
                        .attr('id', "container-" + id);

        editSurvey.append(template);
        $('li[role="footer"]').remove().appendTo( editSurvey );
        return CKEDITOR.replace('ed-' + id);


    },




    /** TODO: need a closure here but need to know how what gets passed from Create Content */
    createContent : function(success){
        $.get('/content/create', success);
    },

    saveContent : function(id, code, complete){
        toggleEditor(id);
        $('#container-' + id).html(code);
        $('.date-container').html( new Date().toDateString() );

        $.post( "/content",
            {   'content' : code,
                'content_id' : id
            }
        ).done(complete)
        .fail(function(data){
            /** TODO: NON_USER RUNTIME ERRORS **/ console.debug(data);}
        );

        tools.attachContentToSurvey(id);
    },





    deleteContent: function(id){
        $.post(
            '/content/' + id,
            {   survey_id: 10,
                _method: "DELETE"
            }
        ).done(function(data){
            console.debug(data);
            $('#comp-' + id).remove();
        }).fail(function(req, stat, err) {
            console.debug(req);
            console.debug(stat);
            console.debug(err);
        });
    },

    
    attachContentToSurvey : function(contentId){
        // attach to survey
        $.post( "/survey/attach",
            {   'content_id' : contentId,
                'survey_id' : window.location.pathname.split('/').pop()
            }
        ).done(function(data){
            tools.saveOrder();
        }).fail(function(data){
            /** TODO: NON_USER RUNTIME ERRORS **/ console.debug(data);}
        );
    },

    detachContentFromSurvey : function(contentId){

        $.post( "/survey/detach",
            {   'content_id' : contentId,
                'survey_id' : window.location.pathname.split('/').pop()
            }
        ).done(function(data){
            //tools.saveOrder();
            $('#comp-' + contentId).remove();

        }).fail(function(data){
            /** TODO: NON_USER RUNTIME ERRORS **/ console.debug(data);}
        );
    },

    insertText : function(id){
        tools.createContent( function(id){
            tools.insertNewCKEditor(id, "text")
        } );
    },

    editText : function(id){
        var code = CKEDITOR.instances['ed-' + id].getData();

        code = code.replace(/\[\[.*\]\]/, '<span class="date-container"></span>');
        console.debug(code);
        this.saveContent(id, code);
    },

    insertDate : function(){
        this.createContent( function(id){
            tools.tagContent(id, 'date');
            tools.insertNewCKEditor(id, 'date')
                .on("instanceReady", function(e){
                    this.setData('<p>[[' + new Date().toDateString() + ']]</p>');
                });
        });
    },

    insertImage : function(image_name){
        this.createContent( function(contentId){
            //tools.tagContent(contentId, 'image');
            var imageName = $('.imgSelected').attr('src');
            var contentImg = '<img class="img-responsive" src="' + imageName + '">';

            $.post(
                "/content",
                {   'content_id' : contentId,
                    'content' : contentImg,
                }
            ).done( function(data){
                tools.attachContentToSurvey(contentId);
                //console.debug(data);

                var editSurvey = $('#edit-survey');
                editSurvey.append('<li role="image" id="img-' + contentId + '">' +
                    '<div class="btn btn-info editBtn" onclick="tools.deleteImage(' + contentId + ')">' +
                        '<span class="glyphicon glyphicon-trash"></span>' +
                    '</div>' +
                    contentImg +
                    '</li>');





                $('li[role="footer"]').remove().appendTo( editSurvey );

            }).fail( function(data){
                /** TODO: NON_USER RUNTIME ERRORS **/
                console.debug(data);
            });




        });
    },

    deleteImage : function(id){
        $('#img-' + id).remove();
        this.deleteContent(id);
    },

    insertFooter : function(){
        tools.createContent( function(id){
            tools.tagContent(id, 'footer');
            tools.insertNewCKEditor(id, 'footer');
        });
    },


    tag : function(event){
        if ($.inArray('tagSurvey', event.target.classList) >= 0) {
            $('#saveTagBtn').click(tools.tagSurvey);
            $('#tagModal').modal('toggle');
        }else if ($.inArray('tagContent', event.target.classList) >= 0) {
            $('#saveTagBtn').click(tools.tagContent);
            var contentId = event.target.parentNode.parentNode.id.substr(-1);
            $('#tagModalContentId').val( contentId );
            $('#tagModal').modal('toggle');
        }
    },




    tagSurvey : function(){
        $.post(
            '/survey/tag',
            {   survey_id: window.location.pathname.split('/').pop(),
                tag: $('#tagName').val()
            }
        ).done(function(data){
            console.debug(data);
        }).fail(function(req, stat, err) {
            console.debug(req);
            console.debug(stat);
            console.debug(err);
        });
    },

    tagContent : function(){
        var contentId = $('#tagModalContentId').val();
        var tagName = $('#tagName').val();

        $.post(
            '/content/tag',
            {   content_id: contentId,
                tag: tagName
            }
        ).done(function(data){
            console.debug(data);
        }).fail(function(req, stat, err) {
            console.debug(req);
            console.debug(stat);
            console.debug(err);
        });
    },



    saveOrder : function (){
        $('#edit-survey')
            .children("li")
            .each(function(i,e){
                $.post(
                    '/survey/order',
                    { content_id : $(e).attr('id').split('-')[1],
                        survey_id : window.location.pathname.split('/').pop(),
                        'order' : i
                    }
                ).done(function(data){
                    //console.debug(data);
                }).fail(function(req, stat, err) {
                    console.debug(req);
                    console.debug(stat);
                    console.debug(err);
                });
        });
    },




    createQuestion : function(success){
        $.get('/question/create', success);
    },

    saveQuestion : function(){
        //$('#container-' + id).html(code);
        //$('.date-container').html( new Date().toDateString() );
        tools.createQuestion( function(data) {
            $.post("/question",
                {   'text': CKEDITOR.instances['ed-new-question'].getData(),
                    'question_id': data.id
                }
            ).done(function(data){})
            .fail(function (data) {
                    /** TODO: NON_USER RUNTIME ERRORS **/ console.debug(data);
            });
        });

        //tools.attachContentToSurvey(id);
    },


    createAnswer : function(success){
        $.get('/answer/create', success);
    },

    saveAnswer : function(){
        //$('#container-' + id).html(code);
        //$('.date-container').html( new Date().toDateString() );
        tools.createAnswer( function(data) {
            $.post("/answer",
                {   'text': CKEDITOR.instances['ed-new-answer'].getData(),
                    'answer_id': data.id
                }
            ).done(function(data){})
                .fail(function (data) {
                    /** TODO: NON_USER RUNTIME ERRORS **/ console.debug(data);
                });
        });

        //tools.attachContentToSurvey(id);
    },



    saveBackground : function(ele){
        var css = "body { ";
        if ( $('#bg-image-selector.active').length > 0 ){

            var imgid = $('a.imgSelected').children('img').attr('imgid');
            var src = $('a.imgSelected').children('img').attr('src');
            $('#page-background')
                .css('background', 'transparent url(' + src + ') no-repeat 0 0')
                .css('background-size', '100%');

            css += 'background: transparent url(' + src + ') no-repeat 0 0; background-size: 100%;';

            tools.saveBgImage();
        }else if ( $('#bg-color-selector.active').length > 0 ){
            css += 'background-color: ' + $('#bg-color').val() + ";";

            $('#page-background')
                .css('background-color', $('#bg-color').val());
        }

        css += "}";

        tools.createContent(function(id){
            tools.saveContent(id, css, function(){
                tools.tagContent(id, 'background');
            });
        });

    },



    populateQuestions : function(complete){
        $.get('/question', function(data){
            $.each(data, function(i, e){
                if ($('#qa-preview').children('li[questionid=' + e.id + ']').length == 0) {
                    $('#existing-questions').append(
                        '<li class="btn btn-default" questionId="' + e.id + '">' +
                        e.text +
                        '</li>'
                    );
                }
            });
            complete();
        });
    },

    populateAnswers : function(complete){
        $.get('/answer', function(data){
            $.each(data, function(i, e){
                $('#existing-answers').append(
                    '<li class="btn btn-default" answerId="' + e.id + '">' +
                        e.text +
                    '</li>'
                );
            })

            complete();;
        });
    },


    createSurveyQuestion : function(ele){
        var order = $('#qa-preview').children('li').length + 1;
        $.post( '/survey-question',
            {   survey_id: window.location.pathname.split('/').pop(),
                question_id:  $(ele).attr('questionId'),
                order : order
            }
        ).done( function(data){
            console.debug(data);
            tools.addQuestionToPreview(ele, data);
        });
    },

    createSurveyAnswer : function(ele){
        var surveyQuestionId = $('#qa-preview li.selected').attr('surveyquestionid');
        var answerId = $(ele).attr('answerId');

        if ($('li[answerid=' + answerId + ']').length > 1){
            alert("You already have that answer");
        }else {
            $.post('/survey-answer',
                {
                    survey_question_id: surveyQuestionId,
                    answer_id: answerId,
                    order: 0
                }
            ).done(function (data) {
                console.debug(data);
                tools.addAnswerToPreview(ele, data);
            });
        }
    },






    saveSurvey : function(){
        $('#qa-preview').children('li').each( function(i,e){
            $.ajax({
                type: 'PUT',
                url: "/survey-question/" + $(e).attr('surveyquestionid'),
                data: { 'order': i + 1 },
                success: function (data) {
                    console.debug(data);
                },
                error: function (data) {
                    console.debug(data);
                },
                dataType: 'json'
            });

            $(e).children('ul').children('li').each( function (ii, ee) {
                $.ajax({
                    type: 'PUT',
                    url: "/survey-answer/" + $(ee).attr('surveyanswerid'),
                    data: { 'order': ii + 1 },
                    success: function (data) {
                        console.debug(data);
                    },
                    error: function (data) {
                        console.debug(data);
                    },
                    dataType: 'json'
                });
            });

        });
        $('#save-survey-btn').removeClass('btn-info');
    },


    addQuestionToPreview : function(ele, data){
        var questionId = $(ele).attr('questionId');

        $('#qa-preview li').removeClass('selected');

        $('li.preview-answer').removeClass('btn-info');

        // Add the question with a delete button and a ul for the answers to be appended to
        $('#qa-preview').append(
            '<li questionId="' + questionId + '" surveyquestionid="'+ data.id +'" class="selected">' +
                '<button type="button" class="close" aria-label="Close">' +
                    '<span aria-hidden="true" onclick="tools.deleteSurveyQuestion(' + data.id + ')">' +
                        '&times;' +
                    '</span>' +
                '</button>' +
                $(ele).html() +
                '<ul id="q-' + ($('qa-preview').children("li").length + 1) + '"></ul>' +
            '</li>');

        // Make the answers sortable
        $('#qa-preview li ul').sortable()

        $('#qa-container').append(
            '<li questionId="' + questionId + '" class="selected">' +
            $(ele).html() +
            '<ul id="q-' + ($('qa-preview').children("li").length + 1) + '"></ul>' +
            '</li>');


        $('li[questionId="' + questionId + '"]').click( function() {
            $('#qa-preview li').removeClass('selected');
            $(this).addClass('selected');
        });

        $("#qa-preview li" ).disableSelection();
        $('#qa-preview').sortable({
            update: function (event, ui){
                //tools.saveAllQuestions();
            }
        });
    },


    removeQuestionFromPreview : function(surveyQuestionid){
        $('li[surveyquestionid=' + surveyQuestionid + ']').remove();
    },


    addAnswerToPreview : function(ele, data) {
        if ( $('#qa-preview li.selected').length > 0 ) {
            var questionId = $('#qa-preview li.selected').attr('questionId');
            var surveyQuestionId = $('#qa-preview li.selected').attr('surveyquestionid');
            var answerId = $(ele).attr('answerId');

            $('li.preview-answer').removeClass('btn-info');


            $('#qa-preview li.selected ul').append(
                '<li class="preview-answer" answerId="' + answerId + '" surveyanswerid="'+ data.id +'">' +
                   '<button type="button" class="close" aria-label="Close">' +
                        '<span aria-hidden="true" onclick="tools.deleteSurveyAnswer(' + data.id + ', ' + surveyQuestionId + ')">' +
                            '&times;' +
                      '</span>' +
                   '</button>' +
                $(ele).html() +
                '</li>');

            $('#qa-container li[questionid="' + questionId + '"] ul').append('<li>' + $(ele).html() + '</li>');
        }
    },

    removeAnswerFromPreview : function(surveyAnswerid){
        $('li[surveyanswerid=' + surveyAnswerid + ']').remove();
    },

    previewDropHandler : function(event, ui) {
        var ele = ui.draggable;

        if (ele.parent().attr('id') == 'existing-questions') {
            tools.createSurveyQuestion(ele)
            ui.draggable.remove();
        } else if (ele.parent().attr('id') == 'existing-answers') {
            tools.createSurveyAnswer(ele);
        }
    },


    saveName : function(){
        var name = $('#survey-name').val();
        $.ajax({
            type: 'PUT',
            url: "/survey/" + window.location.pathname.split('/').pop(),
            data: { 'name': name },
            success: function (data) {
                console.debug(data);
            },
            error: function (data) {
                console.debug(data);
            },
            dataType: 'json'
        });
    },


    deleteSurvey : function() {
        $.ajax({
            type: 'DELETE',
            url: "/survey/" + window.location.pathname.split('/').pop(),
            data: { },
            success: function (data) {
                console.debug(data);
            },
            error: function (data) {
                console.debug(data);
            },
            dataType: 'json'
        });
    },


    deleteSurveyQuestion : function(surveyQuestionId){
        //var questionId = $(ele).parent().parent().attr('questionid');
        //console.debug(qid);

        $.ajax({
            type: 'DELETE',
            url: "/survey-question/" + surveyQuestionId,
            success: function (data) {
                tools.removeQuestionFromPreview(surveyQuestionId);
                console.debug(data);
            },
            error: function (data) {
                console.debug('error');
                console.debug(data);
            },
            dataType: 'json'
        });


    },

    deleteSurveyAnswer : function(surveyAnswerId, surveyQuestionId){
        //var answerId = $(ele).parent().parent().attr('answerid');
        //console.debug(qid);

        $.ajax({
            type: 'DELETE',
            url: "/survey-answer/" + surveyAnswerId,
            data: { survey_question_id : surveyQuestionId },
            success: function (data) {
                tools.removeAnswerFromPreview(surveyAnswerId);
                console.debug(data);
            },
            error: function (data) {
                console.debug(data);
            },
            dataType: 'json'
        });
        //$(ele).parent().parent().remove();
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


};



$(document).ready( function(){
    var questions = $('#questions').html();
    var qaid = $('.survey-questions').parent().attr('id').substr(-1);
    CKEDITOR.instances['ed-' + qaid].setData(questions);



    $('span.tagSurvey').click(tools.tag);
    $('span.tagContent').click(tools.tag);
    $('#save-survey-btn').click(tools.saveSurvey);

    // Make survey answers in the q/a editor sortable
    $('#qa-preview li ul').sortable({ update: function(){
        $('#save-survey-btn').addClass('btn-info');
        //tools.saveSurvey()
    } });

    tools.populateQuestions( function(){
        $('.existing-container li').draggable( { helper: 'clone' } );
        $('#existing-questions').children('li').dblclick(function(event){
            tools.createSurveyQuestion(event.target);
        });
    });

    tools.populateAnswers(function(){
        $('.existing-container li').draggable( { helper: 'clone' } );
        $('#existing-answers').children('li').dblclick(function(event){
            tools.createSurveyAnswer(event.target)
        });
    });


    $('#qa-preview li').click(function () {
        $('#qa-preview li').removeClass('selected');
        $(this).addClass('selected');
    });

    $('.date-container').html( new Date().toDateString() );

    $('.toolbox-item').draggable({
        start: function() {
            $('.toolbox-item').tooltip('hide');
        }
    });

    //$('.existing-container li').draggable( { helper: 'clone' } );

    var preview = $('#qa-preview');
    preview.sortable({ update: function(){
        $('#save-survey-btn').addClass('btn-info');
        //tools.saveSurvey()
    } });
    preview.children().first().addClass('selected');
    preview.droppable({
        accept: ".existing-container li",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: tools.previewDropHandler
      });

    $( "#edit-survey" ).droppable({
        accept: ".toolbox-item",
        activeClass: "ui-state-hover",
        hoverClass: "ui-state-active",
        drop: tools.dropHandler
    });
    
    $( "#edit-survey" ).sortable({
        update: function (event, ui){
            tools.saveOrder();
        }            
    });
    
    $( "#edit-survey" ).disableSelection();
    $( "#edit-survey li>*" ).disableSelection();
    $( "#qa-preview li>*" ).disableSelection();



    $('[data-toggle="tooltip"]').tooltip();

    /*
    $( document ).tooltip({
        position: {
            my: "center bottom-20",
            at: "center top",
            using: function (position, feedback) {
                $(this).css(position);
                $("<div>")

                    .appendTo(this);
            }
        }
    });
    */
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