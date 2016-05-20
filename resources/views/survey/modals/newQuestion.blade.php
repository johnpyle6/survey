<div class="modal fade" tabindex="-1" role="dialog" id="newQuestionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	        <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add New Question</h4>
            </div>
            <div class="modal-body">
            
            
            <!-- MODAL BODY -->
            
            
            
          		<p>Add new question:
          		<div class="ed-comp"  id="ed-comp-new-question col-md-6">
                    <textarea class="" id="ed-new-question"></textarea>
                    <br>
                </div>
          	    <script>
                	CKEDITOR.replace('ed-new-question');
                </script>
          		

								
									          
          	<!--  END MODAL BODY -->
       		              	
            
            </div>
      		<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="tools.addNewQuestion()" data-dismiss="modal">Save changes</button>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
