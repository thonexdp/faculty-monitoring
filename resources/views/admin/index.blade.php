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
      height: 200px;
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
      font-size: 12px;
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
        <button class="btn btn-sm pull-right viewd">View</button>
      </ol>
     
    </div>
  </div>
  <div class="row">
    <div class="col-md-5 col5">
      <div class="row">
        <div class="col-md-12">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Name Of Faculty</b></li>
            @foreach ($faculty as $key => $value)
            <li class="list-group-item">
              @php $reamrks = ''; @endphp
              @foreach ($schedule as $sched)
              @if($value->id == $sched->fId)
                @php $reamrks = $sched->remarks;  @endphp
              @else
              @php $reamrks = '';  @endphp
              @endif
              @endforeach
              <button type="button" class="btn" data-container="body" data-toggle="popover" data-placement="right" data-content="{{$reamrks}}">
               <b>{{$value->firstname." ".$value->middlename." ".$value->lastname}}</b>
              </button>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    
    <div class="col-md-7 col7">
      <div class="tcb-product-slider">
        <div class="container">


         

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox" style="margin-top: -90px;">
                  @php $countIndex = count($faculty);  $countValue = 0; @endphp
                  @foreach ($faculty as $key => $value)
                    <div class="item {{ $key==0?'active':'' }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tcb-product-item">
                                    <div class="tcb-product-photo">
                                        <a href="#"><img src="{{ empty($value->photo)?asset('img/emptyprofile.png'):asset('storage/images/'.$value->photo)}}" class="img-responsive" alt="a" /></a>
                                    </div>
                                    <div class="tcb-product-info">
                                        <div class="tcb-product-title">
                                            <h4><a href="#"> <b> {{ $value->firstname." ".$value->middlename." ".$value->lastname }}</b></a></h4></div>
                                        <div class="tcb-product-rating">
                                           <p style="color: #000;" >{{ (empty($value->ItemName)?'':$value->ItemName['name'])}} <b class='text-danger'> | </b> {{(empty($value->Designation)?'':$value->Designation['name']) }} </p>
                                        </div>
                                        <div class="tcb-hline"></div>
                                        <div class="tcb-product-price text-right">
                                          <a href="#" class="moreinfo pull-right" data-id="{{$value->id}}"> <small>More Info</small> </a>
                                          <h6 class="text-left"> <b>Expertise</b> </h6>
                                          @if(!empty($expertise))
                                            @foreach ($expertise as $item)
                                              @if($item->empId == $value->id)
                                                  <span class="badge badge-primary">{{ $item->description }}</span>
                                              @endif
                                            @endforeach
                                          @endif
                                      </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @endif --}}
                         
                        </div>
                         <div class="col-12">
                            <div class="table-responsive" style="color: aliceblue">
                              <table class="table" id="mytable">
                                <thead>
                                  <tr>
                                    <th class="text-center" colspan="2">STATUS</th>   
                                    <th></th>
                                  </tr>
                                  <tr style="color: #fff;">
                                    <th>IN</th>
                                    <th>OUT</th>
                                    <th>STATUS</th>
                                    <th>REMARKS</th>
                                  </tr>
                                </thead>
                                <tbody class="tbodyrowd">
                                  @if(!empty($schedule))
                                  @foreach ($schedule as $sched)
                                    @if($value->id == $sched->fId)
                                    <tr>
                                      <td>{{ empty($sched->timein)?'':date('H:i:s A', strtotime($sched->timein))  }}</td>
                                      <td>{{empty($sched->timeout)?'':date('H:i:s A', strtotime($sched->timeout))}}</td>
                                      <td>{{$sched->status}}</td>
                                      <td>{{$sched->remarks}}</td>
                                    </tr>
                                    @endif
                                  @endforeach
                                  @endif
                                </tbody>
                              </table>
                            </div>
                          </div>
                      </div>

                      @endforeach
                   {{--  --}}
                         
                         
                       



                      
                       
                  </div>  
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    {{-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> --}}
                    <i class="arrow_left"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    {{-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> --}}
                    <i class="arrow_right"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            {{-- <div class="table-responsive" style="color: aliceblue">
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
                <tbody class="tbodyrow">
                </tbody>
              </table>
            </div>
         --}}
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
  <div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Faculty Information</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4 text-right">
                <p>Name</p>
            </div>
            <div class="col-md-1"> <b>:</b> </div>
            <div class="col-md-7">
              <p class="name">  </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 text-right">
                <p>Gender</p>
            </div>
            <div class="col-md-1"> <b>:</b> </div>
            <div class="col-md-7">
              <p class="sex">  </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 text-right">
                <p>Designation</p>
            </div>
            <div class="col-md-1"> <b>:</b> </div>
            <div class="col-md-7">
              <p class="designation"> </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 text-right">
              <p>Expertise</p>
            </div>
            <div class="col-md-1"> <b>:</b> </div>
            <div class="col-md-7">
              <ul class="expertise">
              </ul>
            </div>
          </div>
        </div>
       
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   @include('include.scripts')
  <script>
  var view = false;
  $(document).ready( function () {
  $.ajaxSetup({
       headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
     });

     $("[data-toggle=popover]").popover();
     getInfo()
    //  $('#mytable > tbody > tr')
    //       .find('td')
    //       .wrapInner('<div style="display: block;" />')
    //       .parent()
    //       .find('td > div')
    //       .slideUp(700, function(){

    //         $(this).parent().parent().remove();

    //       });


   

    $(document).on("click", ".viewd" , function(e) {
              e.preventDefault();
              view = !view
              if(view){
                $('.col5').hide()
                $('.col7').removeClass('col-md-7')
                $('.col7').addClass('col-md-12')
              }else{
                $('.col5').show()
                $('.col7').removeClass('col-md-12')
                $('.col7').addClass('col-md-7')
              }

    })

    
    $(document).on("click", ".moreinfo" , function(e) {
              e.preventDefault();
               const id = $(this).data('id')
               $('.name').html('')
              $('.sex').html('')
                $('.designation').html('')
                $('.expertise').html('')
                     $.ajax({
                              url: '/employee/one',
                              type: 'post',
                              data: {
                                    id
                                },
                              dataType: 'json',
                              beforeSend:function(){
                                // $('.loading-select').html('<i class="spinner-border spinner-border-sm"></i> Loading... ');
                              },
                              success:function(result){
                                console.log(result);
                                $('#MyModal').modal('show');

                                  // console.log('res: ', result);
                                  if(result.status == 200){
                                   // $('#employee-table').DataTable().ajax.reload();
                                     // toastr.success(result.message)
                                     $('.name').html('<b>'+result.data.firstname+' '+(result.data.middlename?result.data.middlename:'')+' '+result.data.lastname+'</b>')
                                     $('.sex').html('<b>'+result.data.sex+'</b>')
                                     $('.designation').html('<b>'+(result.data.designation?result.data.designation.name:'')+'</b>')

                                     if(result.expert){
                                        result.expert.forEach(element => {
                                          $('.expertise').append('<li>'+element.description+'</li>')
                                        });
                                     }
                                    
                                  }
                                  // else{
                                  //   //toastr.error('Error: Please try again!')

                                  // }
                              }
                            })


         })


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



            function getInfo(){
      
                $.ajax({
                  url: '/employee/showlog',
                  type: 'post',
                  dataType: 'json',
                  beforeSend:function(){
                  // $('#bills-form')[0].reset();
                    // $('.loading-select').html('<i class="spinner-border spinner-border-sm"></i> Loading... ');
                  },
                  success:function(result){
                      console.log('res: ', result);
                      if(result.status == 200){


                        result.data.forEach(element => {
                          $('.tbodyrow').append('<tr>\
                              <td> '+(element.name?element.name:'')+'</td>\
                              <td> '+(element.timein?element.timein:'')+'</td>\
                              <td>'+(element.timeout?element.timeout:'')+'</td>\
                              <td>'+(element.status?element.status:'')+'</td>\
                              <td> '+(element.remarks?element.remarks:'')+'</td>\
                            </tr>')
                        });

                      
                      
                  
                      }else if(result.status == 400){
                        $('.tbodyrow').html('<tr>\
                              <td> </td>\
                              <td> </td>\
                              <td></td>\
                              <td></td>\
                              <td></td>\
                            </tr>')

                      }
                  }
                })

              }





              





      })
  </script>
  
  @endsection