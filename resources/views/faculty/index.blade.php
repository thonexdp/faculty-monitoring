@extends('include.app')

@section('content')
@section('content')
 <!--overview start-->
 <div class="row">
    <div class="col-lg-12">
      {{-- <h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3> --}}
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.html">Account</a></li>
        {{-- <li><i class="icon_document_alt"></i>Add</li> --}}
      </ol>
    </div>
  </div>
  <div class="row">
    <!-- profile-widget -->
    <div class="col-lg-12">
      <div class="profile-widget profile-widget-info">
        <div class="panel-body">
          <div class="col-lg-2 col-sm-2">
            {{-- <h4>Jenifer Smith</h4> --}}
            <div class="follow-ava">
              <img src="{{ empty($faculty)?'':empty($faculty->photo)?asset('img/emptyprofile.png'):asset('storage/images/'.$faculty->photo) }}" alt="" style="width: 150px; height : 150px;">
            </div>
            <h6>Faculty</h6>
          </div>
          <div class="col-lg-4 col-sm-4 follow-info text-center" style="margin-top: 20px;">
            <h4> {{ empty($faculty)?'':$faculty->firstname." ".$faculty->middlename." ".$faculty->lastname }}</h4>
            {{-- <p>Hello I’m Jenifer Smith, a leading expert in interactive and creative design.</p> --}}
            <small >{{ empty($faculty)?'':ucwords($faculty->sex) }}</small>
            <p> <i> {{empty($faculty->Designation)?'':ucwords($faculty->Designation['name'])}} </i></p>
            {{-- <h6>
                              <span><i class="icon_clock_alt"></i>11:05 AM</span>
                              <span><i class="icon_calendar"></i>25.10.13</span>
                              <span><i class="icon_pin_alt"></i>NY</span>
                          </h6> --}}
          </div>
          <div class="col-lg-6 col-sm-6 text-left">
            <h4>Expertise</h4>
                <ul>
                  @if($expertise)
                  @foreach ($expertise as $item)
                    <li>{{ ucwords($item->description)}}</li>
                    @endforeach
                  @endif
                </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <section class="panel">
       
        <div class="panel-body">
         
          
            <div id="profile">
              <section class="panel">
                <div class="bio-graph-heading" style="padding: 10px;">
                    Logs To Monitor yout status
                </div>
                <div class="panel-body bio-graph-info">
                  <h3>Status</h3>
                  <hr>
                  <div class="row">
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm btn-block" type="button">IN</button>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-sm btn-block" type="button">OUT</button>
                       
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-sm btn-block" type="button">ON MEETING</button>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-sm btn-block" type="button">ON LEAVE</button>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger btn-sm btn-block" type="button">ON TRAVEL</button>
                    </div>
                   

                    {{-- <div class="bio-row">
                      <p><span>First Name </span>: Jenifer </p>
                    </div>
                    <div class="bio-row">
                      <p><span>Last Name </span>: Smith</p>
                    </div>
                    <div class="bio-row">
                      <p><span>Birthday</span>: 27 August 1987</p>
                    </div>
                    <div class="bio-row">
                      <p><span>Country </span>: United</p>
                    </div>
                    <div class="bio-row">
                      <p><span>Occupation </span>: UI Designer</p>
                    </div>
                    <div class="bio-row">
                      <p><span>Email </span>:jenifer@mailname.com</p>
                    </div>
                    <div class="bio-row">
                      <p><span>Mobile </span>: (+6283) 456 789</p>
                    </div>
                    <div class="bio-row">
                      <p><span>Phone </span>: (+021) 956 789123</p>
                    </div> --}}
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Time In</th>
                                <th scope="col">Time Out</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td> 8: 00 AM</td>
                                <td> 9: 00 AM</td>
                                <td>On Leave</td>
                                <td> NOv. 23, 2022 - Dec. 14, 2022</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                  </div>
                </div>
              </section>
              <section>
                <div class="row">
                </div>
              </section>
            </div>
            <!-- edit-profile -->
            
         
        </div>
      </section>
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