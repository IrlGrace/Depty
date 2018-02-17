@if(count($errors) > 0)
	<div class="modal fade" id="errorModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">

          <p>{{ $errors->first('content') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
        </div>
      </div>
      
    </div>
  </div>
@endif
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

<div class="modal fade" id="confirm-deletepost" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4 class="modal-title">Delete Post</h4>
        </div>
        <div class="modal-body">

          <p>Are you sure to delete this post?</p>
          <p id="posting_id"></p>
        </div>
        <div class="modal-footer">
          <a class="btn btn-default" id="canceldelete_btn" href="#" data-dismiss="modal">Cancel</a>
          <a class="btn btn-danger btn-ok"  id="delete_btn" href="#" >Delete</a>
        </div>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="editPostModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Post</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="post-content">Edit the Post</label>
              <input type="hidden" id="post-id" />
              <textarea class="form-control" name="post-content" id="post-content" rows="8"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <a type="button" class="btn btn-default" id="canceledit_btn" data-dismiss="modal">Cancel</a>
          <a class="btn btn-danger"  id="savechangespost_btn" href="#"  data-dismiss="modal" >Save Changes</a>
        </div>
      </div>
      
    </div>
  </div>
  <script>
    var token='{{Session::token()}}';
    var urlEdit='{{ route('post.edit')}}';
    var urlSupport='{{ route('post.support')}}';
  </script>



