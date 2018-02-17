
$(document).ready(function() {
    $("#errorModal").modal("show");
    $("#messageModal").modal("show");
    
    $('#confirm-deletepost').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });


    $('#editPostModal').on('show.bs.modal', function(e) {
      $('#post-id').val($(e.relatedTarget).data('postid'));
      $('#post-content').val($(e.relatedTarget).data('content'));
      $('#post-content').val($('#pc'+$('#post-id').val()).text());
      
    });

    $('#savechangespost_btn').on('click', function(e){
      $.ajax({
        method: 'POST',
        url: urlEdit,

        data:{ content: $('#post-content').val(),
               post_id: $('#post-id').val(),
               _token: token ,

        },
        success:function(msg){
              $('#pc'+$('#post-id').val()).text(msg['new_content']);
              //$('#editPostModal').modal('hide');
             // $("#editPostModal .close").click();
              
            }
      });
      
    });

    $('.support_btn').on('click', function(e){
      e.preventDefault();
      var postid = $(e.target).data('postid');
      $.ajax({
        method: 'POST',
        url: urlSupport,
        data:{
          post_id:postid,
          _token:token
        },
        success:function(msg){
          $(e.target).toggleClass('btn-danger');
          $('#support'+postid).text(msg['num_support']);
          alert(msg['num_support']);
        }
      });
    });


    $(".talk_btn").click(function(e){
        e.preventDefault();
        var postid = $(e.target).data('postid');
        $("#comments"+postid).toggle();
    });
   
 


});
