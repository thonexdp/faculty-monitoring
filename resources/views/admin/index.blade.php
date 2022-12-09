@extends('include.app')

@section('content')
<style>
  .tcb-product-slider {
    background: #324c57;
    /* background-image: url(https://unsplash.it/1240/530?image=721); */
    background-size: cover;
    background-repeat: no-repeat;
    padding: 100px 0;
    }
    .tcb-product-slider .carousel-control {
      width: 5%;
    }
    .tcb-product-item a {
      color: #147196;
    }
    .tcb-product-item a:hover {
      text-decoration: none;
    }
    .tcb-product-item .tcb-hline {
      margin: 10px 0;
      height: 1px;
      background: #ccc;
    }
    @media all and (max-width: 768px) {
      .tcb-product-item {
        margin-bottom: 30px;
      }
    }
    .tcb-product-photo {
      text-align: center;
      height: 180px;
      background: #fff;
    }
    .tcb-product-photo img {
      height: 100%;
      display: inline-block;
    }
    .tcb-product-info {
      background: #f0f0f0;
      padding: 15px;
    }
    .tcb-product-title h4 {
      margin-top: 0;
      white-space: nowrap;
      text-overflow: ellipsis;
      overflow: hidden;
    }
    .tcb-product-rating {
      color: #acacac;
    }
    .tcb-product-rating .active {
      color: #FFB500;
    }
    .tcb-product-price {
      color: firebrick;
      font-size: 18px;
    }



    .details {
    margin: 50px 0; }
 .details h1 {
      font-size: 32px;
      text-align: center;
      margin-bottom: 3px; }
    .details .back-link {
      text-align: center; }
      .details .back-link a {
        display: inline-block;
        margin: 20px 0;
        padding: 15px 30px;
        background: #333;
        color: #fff;
        border-radius: 24px; }
        .details .back-link a svg {
          margin-right: 10px;
          vertical-align: text-top;
          display: inline-block; }
</style>
 <!--overview start-->
 <div class="row">
    <div class="col-lg-12">
      {{-- <h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3> --}}
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.html">Dashboard</a></li>
        {{-- <li><i class="icon_document_alt"></i>Add</li> --}}
      </ol>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tcb-product-slider">
        <div class="container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox" style="margin-top: -90px;">
                  <?php $countIndex = count($faculty); ?>
                    <div class="item active">
                        <div class="row">
                          @foreach ($faculty as $key => $value)
                          @if($key < 3)
                            <div class="col-xs-6 col-sm-4">
                                <div class="tcb-product-item">
                                    <div class="tcb-product-photo">
                                        <a href="#"><img src="{{ empty($value->photo)?asset('img/emptyprofile.png'):asset('storage/images/'.$value->photo)}}" class="img-responsive" alt="a" /></a>
                                    </div>
                                    <div class="tcb-product-info">
                                        <div class="tcb-product-title">
                                            <h4><a href="#"> <b> {{ $value->firstname." ".$value->middlename." ".$value->lastname }}</b></a></h4></div>
                                        <div class="tcb-product-rating">
                                           <p style="color: #000;" >{{ empty($value->Designation)?'':$value->Designation['name'] }} </p>
                                        </div>
                                        <div class="tcb-hline"></div>
                                        <div class="tcb-product-price text-right">
                                            <a href="#"> <small>More Info</small> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @endforeach
                        </div>
                    </div>
                   @if($countIndex > 3)
                    <div class="item">
                      <div class="row">
                        @foreach ($faculty as $key => $value)
                        @if($key >= 3)
                            <div class="col-xs-6 col-sm-4">
                              <div class="tcb-product-item">
                                  <div class="tcb-product-photo">
                                      <a href="#"><img src="{{ empty($value->photo)?asset('img/emptyprofile.png'):asset('storage/images/'.$value->photo)}}" class="img-responsive" alt="a" /></a>
                                  </div>
                                  <div class="tcb-product-info">
                                      <div class="tcb-product-title">
                                          <h4><a href="#"> <b> {{ $value->firstname." ".$value->middlename." ".$value->lastname }}</b></a></h4></div>
                                      <div class="tcb-product-rating">
                                        <p style="color: #000;" >{{ empty($value->Designation)?'':$value->Designation['name'] }} </p>
                                      </div>
                                      <div class="tcb-hline"></div>
                                      <div class="tcb-product-price text-right">
                                          <a href="#"> <small>More Info</small> </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endif
                          @endforeach
                      </div>
                      @endif
                      @if($countIndex > 6)
                      <div class="item">
                        <div class="row">
                          @foreach ($faculty as $key => $value)
                          @if($key >= 6)
                              <div class="col-xs-6 col-sm-4">
                                <div class="tcb-product-item">
                                    <div class="tcb-product-photo">
                                        <a href="#"><img src="{{ empty($value->photo)?asset('img/emptyprofile.png'):asset('storage/images/'.$value->photo)}}" class="img-responsive" alt="a" /></a>
                                    </div>
                                    <div class="tcb-product-info">
                                        <div class="tcb-product-title">
                                            <h4><a href="#"> <b> {{ $value->firstname." ".$value->middlename." ".$value->lastname }}</b></a></h4></div>
                                        <div class="tcb-product-rating">
                                          <p style="color: #000;" >{{ empty($value->Designation)?'':$value->Designation['name'] }} </p>
                                        </div>
                                        <div class="tcb-hline"></div>
                                        <div class="tcb-product-price text-right">
                                            <a href="#"> <small>More Info</small> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        @endif
                        @if($countIndex > 9)
                        <div class="item">
                          <div class="row">
                            @foreach ($faculty as $key => $value)
                            @if($key >= 9)
                                  <div class="col-xs-6 col-sm-4">
                                    <div class="tcb-product-item">
                                        <div class="tcb-product-photo">
                                            <a href="#"><img src="{{ empty($value->photo)?asset('img/emptyprofile.png'):asset('storage/images/'.$value->photo)}}" class="img-responsive" alt="a" /></a>
                                        </div>
                                        <div class="tcb-product-info">
                                            <div class="tcb-product-title">
                                                <h4><a href="#"> <b> {{ $value->firstname." ".$value->middlename." ".$value->lastname }}</b></a></h4></div>
                                            <div class="tcb-product-rating">
                                              <p style="color: #000;" >{{ empty($value->Designation)?'':$value->Designation['name'] }} </p>
                                            </div>
                                            <div class="tcb-hline"></div>
                                            <div class="tcb-product-price text-right">
                                                <a href="#"> <small>More Info</small> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              @endif
                              @endforeach
                          </div>
                          @endif







                  </div>

                  

                 
                   
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="table-responsive" style="color: aliceblue">
              <table class="table" id="mytable">
                <thead>
                  <tr style="color: #fff;">
                    <th>NAME</th>
                    <th>TIME IN</th>
                    <th>TIME OUT</th>
                    <th>STATUS</th>
                    <th>REMARKS</th>
                  </tr>
                </thead>
                <tbody>
                  @if($schedule)
                  @foreach($schedule as $value)
                  <tr>
                    <td> <b> {{ empty($value['faculty'])?'':$value['faculty']['firstname']." ".$value['faculty']['middlename']." ".$value['faculty']['lastname'] }} </b> </td>
                    <td>{{ $value['timein'] }}</td>
                    <td>{{ $value['timeout'] }}</td>
                    <td>{{ $value['status'] }}</td>
                    <td>{{ $value['remarks'] }}</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
        
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



    //  $('#mytable > tbody > tr')
    //       .find('td')
    //       .wrapInner('<div style="display: block;" />')
    //       .parent()
    //       .find('td > div')
    //       .slideUp(700, function(){

    //         $(this).parent().parent().remove();

    //       });



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