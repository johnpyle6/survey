<div class="modal fade" tabindex="-1" role="dialog" id="tagModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	        <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Tag</h4>
            </div>
            <div class="modal-body">
            
            
            <!-- MODAL BODY -->
                <p id="color-select">
                    {!! Form::label('tagName', 'Tag Name: ') !!}
                    {!! Form::text('tagName', '', ['id' => 'tagName']) !!}
                    {!! Form::hidden('tagModalContentId', '', ['id' => 'tagModalContentId']) !!}

                </p>

          	<!--  END MODAL BODY -->


            </div>
      		<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary" id="saveTagBtn" data-dismiss="modal">
                    Add Tag
                </button>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
