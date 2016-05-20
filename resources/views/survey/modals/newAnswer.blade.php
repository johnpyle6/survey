<div class="modal fade" tabindex="-1" role="dialog" id="newAnswerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	        <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Add New Answer</h4>
            </div>
            <div class="modal-body">
            
            
            <!-- MODAL BODY -->
            
                <textarea class="" id="ed-new-answer"></textarea>
                <br>
                <script>CKEDITOR.replace('ed-new-answer');</script>

            <!--  END MODAL BODY -->
       		              	
            
            </div>
      		<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="tools.addNewAnswer()" data-dismiss="modal">Save changes</button>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->