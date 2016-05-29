<div class="modal fade" tabindex="-1" role="dialog" id="bgImageModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	        <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Insert Image</h4>
            </div>
        <div class="modal-body">
      
      
            <div class="row">
                <div class="col-xs-3 col-md-3">
                  <a href="#" class="thumbnail" onclick="imgSelect(this)">
                    <img imgid="1" src="/images/trump.jpg" alt="...">
                  </a>
                </div>
                <div class="col-xs-3 col-md-3">
                    <a href="#" class="thumbnail" onclick="imgSelect(this)">
                        <img imgid="2" src="/images/trump2.jpg" alt="...">
                    </a>
                </div>
            </div>  
        
    		<div id="image-upload">
    			{!! Form::open(['files' => true, 'url' => 'survey/rest/saveImage', 'class' => 'form-inline', 'id' => 'image-form']) !!}
                <div class="form-group">

    			{!! Form::file('image', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                {!! Form::submit('Upload', ['class' => 'btn btn-default form-control']) !!}
    			{!! Form::close() !!}
    			</div>
    		</div>	        	
        
        
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="tools.insertImage()" data-dismiss="modal">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

