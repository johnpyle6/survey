<div class="modal fade" tabindex="-1" role="dialog" id="adsModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	        <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Insert Ads</h4>
            </div>
        	<div class="modal-body" style="overflow-y: scroll; height: 600px;">
        		<div id="image-upload">
        			{!! Form::open(['files' => true, 'url' => 'survey/rest/saveImage', 'class' => '', 'id' => 'image-form']) !!}
					
					@foreach ($ads as $ad)
					<div class="row">
						<div class="col-md-1 col-sm-1">        			
        					{!! Form::radio('ad',  $ad->id , null, ['class' => 'radio-ad'] ) !!}
        				</div>
        				<div class="col-md-11 col-sm-11">
            				<div class="ad-preview">
            					@include('survey.ads.' . $ad->template_name)
            				</div>
            			</div>
        			</div>
        			@endforeach
        			
        			
        			{!! Form::close() !!}
        		</div>	        	
        	</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="insertAd()" data-dismiss="modal">Save changes</button>
            </div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->