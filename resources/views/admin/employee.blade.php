@extends('include.app')

@section('content')
 <!--overview start-->
 <div class="row">
    <div class="col-lg-12">
      {{-- <h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3> --}}
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.html">Faculty</a></li>
        {{-- <li><i class="icon_document_alt"></i>Add</li> --}}
      </ol>
    </div>
  </div>
 
 <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a href="/employee/add" class="btn btn-success btn-sm pull-right">Add Faculty</a>
                <h5>  Faculty List</h5>
            </div>
            <div class="card-body">
                <section class="panel" style="margin-top: 50px;">
                    {{-- <header class="panel-heading">
                    
                    </header> --}}
                    <div class="table-responsive" >
                      <table class="table" id="employee-table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Avatar</th>
                            <th>FirstName</th>
                            <th>MiddleName</th>
                            <th>LastName</th>
                            <th>EmployeeNo.</th>
                            <th>Sex</th>
                            <th>Designation</th>
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
   @include('include.scripts')
  <script>

  $(document).ready( function () {
  $.ajaxSetup({
       headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
     });
            $('#employee-table').DataTable({
                processing: true,
                //info: true,
                responsive : true,
                ordering: false,
                "ajax" :{
                    "url" : "/employee/show",
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
                    {data: 'photo', name: 'photo'},
                    {data: 'firstname', name: 'firstname'},
                    {data: 'middlename', name: 'middlename'},
                    {data: 'lastname', name: 'lastname'},
                    {data: 'empno', name: 'empno'},
                    {data: 'sex', name: 'sex'},
                    {data: 'designation', name: 'designation'},
                    {data: 'action', name: 'action'},                            
                    ],
                    error: function(err) {
                        if(err.status === 500){
                            toastr.error('Server is Offline')  
                        }
                      }
              })


              $(document).on("click", ".btn-delete-employee" , function(e) {
              e.preventDefault();
                  const id = $(this).data('id')
                  alerty.confirm(
                          'Are you sure to this delete permanently??', 
                          {title: 'Confirm!', cancelLabel: 'Cancel', okLabel: 'Confirm'}, 
                          function(){
                            $.ajax({
                              url: '/employee/delete',
                              type: 'post',
                              data: {
                                    id
                                },
                              dataType: 'json',
                              beforeSend:function(){
                                // $('.loading-select').html('<i class="spinner-border spinner-border-sm"></i> Loading... ');
                              },
                              success:function(result){
                                  console.log('res: ', result);
                                  if(result.status == 200){
                                    $('#employee-table').DataTable().ajax.reload();
                                     // toastr.success(result.message)
                                  }
                                  else{
                                    //toastr.error('Error: Please try again!')

                                  }
                              }
                            })
                          },
                          function() {
                           // alerty.toasts('this is cancel callback')
                          }
                        )
                                

            })




              





      })
  </script>
  
  @endsection