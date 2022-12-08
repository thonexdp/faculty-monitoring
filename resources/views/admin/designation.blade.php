@extends('include.app')

@section('content')
 <!--overview start-->
 <div class="row">
    <div class="col-lg-12">
      <section class="panel">
        <header class="panel-heading">
         Designation List
         <a href="#" class="btn btn-success btn-sm pull-right add-d">Add Designation</a>
        </header>
        <div class="row">
          <div class="col-md-12 show-msg">
          </div>
        </div>
        <div class="table-responsive">
          <table class="table" id="designation-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>


            <!-- Modal -->
            <div class="modal fade" id="DModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Designation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <input type="hidden" name="d_id">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Designation">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer mt-4">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-d">Save</button>
                  </div>
                </div>
              </div>
            </div>

      </section>
    </div>
  </div>
  @include('include.scripts')
  <script>
    $(document).ready( function () {
      $.ajaxSetup({
       headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
     });

            $(document).on("click", ".add-d" , function(e) {
                      e.preventDefault();
                      $('input[name="d_id"]').val('')
                      $('#DModal').modal('show')

            })

            $(document).on("click", ".btn-edit" , function(e) {
                      e.preventDefault();
                    const id = $(this).data('id')
                    getInfo(id)
            })


                
            function getInfo(id){
                  $.ajax({
                    url: '/designation/edit',
                    type: 'post',
                    data: {
                          id
                      },
                    dataType: 'json',
                    beforeSend:function(){
                      $('input[name="name"]').val('')
                      // $('.loading-select').html('<i class="spinner-border spinner-border-sm"></i> Loading... ');
                    },
                    success:function(result){
                        console.log('res: ', result);
                        if(result.status == 200){
                          $('#DModal').modal('show')
                          $('input[name="d_id"]').val(result.data.id)
                          $('input[name="name"]').val(result.data.name)
                        }
                    }
                  })

                }



            $(document).on("click", ".save-d" , function(e) {
                      e.preventDefault();
                      var name = $('input[name="name"]').val()
                      var id =  $('input[name="d_id"]').val()
                      $.ajax({
                              url: '/designation/save',
                              type: 'post',
                              data: {
                                    name,
                                    id
                                },
                              beforeSend:function(){
                                // $('.loading-select').html('<i class="spinner-border spinner-border-sm"></i> Loading... ');
                              },
                              success:function(result){
                                  console.log('res: ', result);
                                  $('#DModal').modal('hide');
                                  if(result.status == 200){
                                    $('#designation-table').DataTable().ajax.reload();
                                     $('.show-msg').html('<div class="alert alert-success fade in">\
                                          <button data-dismiss="alert" class="close close-sm" type="button">\
                                                              <i class="icon-remove"></i>\
                                                          </button>\
                                          <strong>Well done!</strong> '+result.message+'.\
                                        </div>');
                                  }
                                  else{
                                    $('.show-msg').html('<div class="alert alert-danger fade in">\
                                                    <button data-dismiss="alert" class="close close-sm" type="button">\
                                                                        <i class="icon-remove"></i>\
                                                                    </button>\
                                                    <strong>Error!</strong> '+result.message+'.\
                                                  </div>');
                                  }
                                  setTimeout(() => {
                                    $('.show-msg').html('')
                                  }, 5000);
                              }
                            })

            })


          


            $(document).on("click", ".btn-delete" , function(e) {
              e.preventDefault();
                  const id = $(this).data('id')
                  alerty.confirm(
                          'Are you sure to this delete permanently??', 
                          {title: 'Confirm!', cancelLabel: 'Cancel', okLabel: 'Confirm'}, 
                          function(){
                            $.ajax({
                              url: '/designation/delete',
                              type: 'post',
                              data: {
                                    id
                                },
                              dataType: 'json',
                              beforeSend:function(){
                                // $('.loading-select').html('<i class="spinner-border spinner-border-sm"></i> Loading... ');
                              },
                              success:function(result){
                                if(result.status == 200){
                                    $('#designation-table').DataTable().ajax.reload();
                                     $('.show-msg').html('<div class="alert alert-success fade in">\
                                          <button data-dismiss="alert" class="close close-sm" type="button">\
                                                              <i class="icon-remove"></i>\
                                                          </button>\
                                          <strong>Well done!</strong> '+result.message+'.\
                                        </div>');
                                  }
                                  else{
                                    $('.show-msg').html('<div class="alert alert-danger fade in">\
                                                    <button data-dismiss="alert" class="close close-sm" type="button">\
                                                                        <i class="icon-remove"></i>\
                                                                    </button>\
                                                    <strong>Error!</strong> '+result.message+'.\
                                                  </div>');
                                  }
                                  setTimeout(() => {
                                    $('.show-msg').html('')
                                  }, 5000);
                              }
                            })
                          },
                          function() {
                           // alerty.toasts('this is cancel callback')
                          }
                        )
                                

            })




            $('#designation-table').DataTable({
                processing: true,
                //info: true,
                responsive : true,
                ordering: false,
                "ajax" :{
                    "url" : "/designation/show",
                    "type" : "POST",
                      // "data": function(set){
                      //           set.campus = campus;
                      //       },
                      // error: function (xhr, error, code) {
                      //       console.log(xhr, code);
                      //   }
                      },
                "pageLength": 10,
                "aLengthMenu":[[10,25,50,100,-1],[10,25,50,100,'All']],
                  columns: [
                    {data: 'id', name: 'id'},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action'},                            
                    ],
                    error: function(err) {
                        if(err.status === 500){
                            toastr.error('Server is Offline')  
                        }
                      }
              })
              })
  </script>
  @endsection