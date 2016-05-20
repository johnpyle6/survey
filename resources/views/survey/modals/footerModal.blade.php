<div class="modal fade" tabindex="-1" role="dialog" id="footerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	        <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Choose Footer</h4>
            </div>
            <div class="modal-body">
          
          		<input type="radio" name="footer" value="wa">
          		<footer id="content-footer">
              		@include('survey.layouts.footer_wa')
              	</footer>
          	
              	<input type="radio" name="footer" value="lop">
              	<footer id="content-footer">
                    @include('survey.layouts.footer_lop')
              	</footer>
          
          	
       		              	
            
            
            </div>
      		<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="tools.addFooter()" data-dismiss="modal">Save changes</button>
      		</div>
    	</div><!-- /.modal-content -->
  	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
