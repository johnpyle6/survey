<div class="modal fade" tabindex="-1" role="dialog" id="listModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	        <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Background</h4>
            </div>
	        <div class="modal-body">
    		
    			<div id="list-chooser" class="btn-group" data-toggle="buttons">
				@foreach ($lists as $list)
					<label class="btn btn-default">
						<input type="checkbox" autocomplete="off" class="btn" value="{{ $list['id'] }}">
						{{ $list['name'] }}
					</label>
				@endforeach

        	</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		<button type="button" class="btn btn-primary" onclick="saveBackground()" data-dismiss="modal">Save changes</button>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->