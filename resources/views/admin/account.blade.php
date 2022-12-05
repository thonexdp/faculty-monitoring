@extends('include.app')

@section('content')
@section('content')
 <!--overview start-->
 <div class="row">
    <div class="col-lg-12">
      {{-- <h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3> --}}
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="dashboard">Dashboard</a></li>
        {{-- <li><i class="icon_document_alt"></i>Add</li> --}}
      </ol>
    </div>
  </div>
 
 <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>  Account List</h5>
            </div>
            <div class="card-body">
                <section class="panel" style="margin-top: 50px;">
                    {{-- <header class="panel-heading">
                    </header> --}}
                    <div class="table-responsive" >
                      <table class="table" id="account-table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Avatar</th>
                            <th>FirstName</th>
                            <th>MiddleName</th>
                            <th>UserName</th>
                            <th>User Type</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                      </table>
                    </div>
            
                  </section>
            </div>
        </div>
     
    </div>
  </div>
  <div class="modal fade" id="AccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
   @include('include.scripts')
  <script>

  $(document).ready( function () {
  $.ajaxSetup({
       headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
     });

     $(document).on("click", ".add-account" , function(e) {
              e.preventDefault();
        $('#AccountModal').modal('show');

     })
            $('#account-table').DataTable({
                processing: true,
                //info: true,
                responsive : true,
                ordering: false,
                "ajax" :{
                    "url" : "/account/show",
                    "type" : "POST",
                      },
                "pageLength": 10,
                "aLengthMenu":[[10,25,50,100,-1],[10,25,50,100,'All']],
                  columns: [
                    {data: 'id', name: 'id'},
                    {data: 'photo', name: 'photo'},
                    {data: 'firstname', name: 'firstname'},
                    {data: 'lastname', name: 'lastname'},
                    {data: 'username', name: 'username'},
                    {data: 'usertype', name: 'usertype'},
                    // {data: 'action', name: 'action'},                            
                    ],
                    error: function(err) {
                        if(err.status === 500){
                            toastr.error('Server is Offline')  
                        }
                     }
              })


              // $(document).on("click", ".btn-delete-employee" , function(e) {
              //  e.preventDefault();
              //     const id = $(this).data('id')
              //     alerty.confirm(
              //             'Are you sure to this delete permanently??', 
              //             {title: 'Confirm!', cancelLabel: 'Cancel', okLabel: 'Confirm'}, 
              //             function(){
              //               $.ajax({
              //                 url: '/employee/delete',
              //                 type: 'post',
              //                 data: {
              //                       id
              //                   },
              //                 dataType: 'json',
              //                 beforeSend:function(){
              //                   // $('.loading-select').html('<i class="spinner-border spinner-border-sm"></i> Loading... ');
              //                 },
              //                 success:function(result){
              //                     console.log('res: ', result);
              //                     if(result.status == 200){
              //                       $('#employee-table').DataTable().ajax.reload();
              //                        // toastr.success(result.message)
              //                     }
              //                     else{
              //                       //toastr.error('Error: Please try again!')

              //                     }
              //                 }
              //               })
              //             },
              //             function() {
              //              // alerty.toasts('this is cancel callback')
              //             }
              //           )
                                

              // })




              





      })
  </script>
  
  @endsection