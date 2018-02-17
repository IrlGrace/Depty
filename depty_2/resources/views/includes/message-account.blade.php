
@if(Session::has('message'))
	<div class="modal fade" id="messageModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">

          <p>{{ Session::get('message') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
        </div>
      </div>
      
    </div>
  </div>
@endif


<script type="text/javascript">
    $(document).ready(function() {
    $("#messageModal").modal("show");
    });
</script>

