@extends('include.app')

@section('content')
 <!--overview start-->
<style>
  .error-input{
    border-style: solid; 
    border-color: coral;
  }
</style>
 <div class="row">
  <div class="col-lg-12">
    {{-- <h3 class="page-header"><i class="fa fa-files-o"></i> Form Validation</h3> --}}
    <ol class="breadcrumb">
      <li><i class="fa fa-home"></i><a href="index.html">Faculty</a></li>
      <li><i class="icon_document_alt"></i>Add</li>
    </ol>
  </div>
</div>
 <div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
       Faculty Information
      </header>
      <div class="panel-body">
       
        <div class="form">
          <form class="form-validate form-horizontal " id="register_form" enctype="multipart/form-data" >
            <input type="hidden" name="id" value="{{ empty($faculty->id)?'':$faculty->id }}">
            <div class="row">
              <div class="col-md-12 success-msg">
                
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group ">
                  <label for="fullname" class="control-label col-md-4">Firstname <span class="required">*</span></label>
                  <div class="col-md-8">
                    <input class=" form-control" name="firstname" type="text" value="{{ empty($faculty->firstname)?'':$faculty->firstname }}" />
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group ">
                  <label for="address" class="control-label col-md-4">MiddleName <span class="required"></span></label>
                  <div class="col-md-8">
                    <input class=" form-control" name="middlename" type="text" value="{{ empty($faculty->middlename)?'':$faculty->middlename }}" />
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group ">
                  <label for="address" class="control-label col-md-4">LastName <span class="required">*</span></label>
                  <div class="col-md-8">
                    <input class=" form-control is-invalid"  name="lastname" type="text" value="{{ empty($faculty->lastname)?'':$faculty->lastname }}" />
                  </div>
                </div>
              </div>
            </div>

            <div class="row" style="margin-top: 20px;">
              <div class="col-md-4">
                <div class="form-group ">
                  <label for="fullname" class="control-label col-md-4">Gender <span class="required"></span></label>
                  <div class="col-md-8">
                   <select name="sex" class="form-control">
                     <option value="male" {{ empty($faculty->sex)?'':($faculty->sex=='male'?'selected':'') }}>Male </option>
                     <option value="female"  {{ empty($faculty->sex)?'':($faculty->sex=='female'?'selected':'') }}>Female</option>
                   </select>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group ">
                  <label for="address" class="control-label col-md-3">Item Name <span class="required">*</span></label>
                  <div class="col-md-9">
                    <select name="itemname" class="form-control">
                      <option value="" selected disabled>--Select ItemName--</option>
                      @if($itemname)
                        @foreach($itemname as $item)
                          <option value="{{$item->id}}" {{ empty($faculty->itemname)?'':($faculty->itemname==$item->id?'selected':'') }} > {{ $item->name }} </option>
                        @endforeach
                      @endif
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group ">
                  <label for="fullname" class="control-label col-md-6">Employee No. <span class="required"></span></label>
                  <div class="col-md-6">
                    <input type="text" name="employeeId" class="form-control" value="{{ empty($faculty->employeeId)?'':$faculty->employeeId }}"  />
                  </div>
                </div>
              </div>
              
            </div>
            <div class="row" style="margin-top: 10px">
              <div class="col-md-4">
                <label for="address" class="control-label col-md-4">Photo </label>
                  <div class="col-md-8 text-center">
                    <img src=" {{ empty($faculty->photo)?asset('img/emptyprofile.png'):asset('storage/images/'.$faculty->photo)}}" class="rounded float-left img-profile" id="img-profile" style="border-radius: 20px;" width="150">
                    <input type="file" name="image" style=" margin: auto; margin-top: 10px;" accept="image/*"  onchange="loadFile(event)"/>
                  </div>
              </div>
              <div class="col-md-8">
                <div class="col-12">
                  <div class="form-group ">
                    <label for="address" class="control-label col-md-3">Designation <span class="required">*</span></label>
                    <div class="col-md-9">
                      <select name="designation" class="form-control">
                        <option value="" selected disabled>--Select Designation--</option>
                        @if($designation)
                          @foreach($designation as $item)
                            <option value="{{$item->id}}" {{ empty($faculty->designation)?'':($faculty->designation==$item->id?'selected':'') }} > {{ $item->name }} </option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <hr>
                  <h4>Expertise</h4>
                  <hr>
                </div>
                <div class="form-group ">
                  <label for="fullname" class="control-label col-md-2">Description </label>
                  <div class="col-md-10">
                    <input class=" form-control" name="expertise" type="text" />
                  </div>
                 
                  <label for="fullname" class="control-label col-md-2"> </label>
                  <div class="col-md-10" style="margin-top: 10px;">
                       <button class="btn btn-xs btn-warning add-skill">Add List</button>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="fullname" class="control-label col-md-2"> </label>
                  <div class="col-md-10">
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action ">
                        <b style="color : #000;">Expertise List</b> 
                      </a>
                      <div class="skills">
                        @if($expertise)
                          @foreach($expertise as $item)
                           <a href="javascript::void(0)" class="list-group-item list-group-item-action">{{$item->description}}</a><input type="hidden" name="expertiselist[]" value="{{$item->description}}"> 
                          @endforeach
                        @endif
                      </div>
                     
                    </div>
                  </div>
                </div>
               
              </div>
            </div>
           {{-- <div class="row">
            <div class="col-md-12">
              <hr>
              <h4>Schedule</h4>
            </div>
            <div class="col-md-4">
              <div class="form-group ">
                <label for="fullname" class="control-label col-md-3">Time In <span class="required">*</span></label>
                <div class="col-md-9">
                  <input class=" form-control" id="fullname" name="fullname" type="time" />
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group ">
                <label for="address" class="control-label col-md-4">Time Out <span class="required">*</span></label>
                <div class="col-md-8">
                  <input class=" form-control" id="address" name="address" type="time" />
                </div>
              </div>
            </div>
           </div> --}}

           {{-- <div class="row">
            <div class="col-md-12">
              <hr>
              <h4>Expertise</h4>
            </div>
            <div class="col-md-6">
              <div class="form-group ">
                <label for="fullname" class="control-label col-md-3">Description </label>
                <div class="col-md-9">
                  <input class=" form-control" id="fullname" name="fullname" type="text" />
                </div>
               
                <label for="fullname" class="control-label col-md-3"> </label>
                <div class="col-md-9" style="margin-top: 10px;">
                     <button class="btn btn-xs btn-warning">Add List</button>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action ">
                  <b style="color : #000;">Expertise List</b> 
                </a>
                <div>
                  <a href="#" class="list-group-item list-group-item-action">Netorking</a>
                </div>
               
              </div>
            </div>
           </div> --}}
           <div class="row">
            <div class="col-md-12">
              <hr>
              <button class="btn btn-primary" type="submit">Save</button>
              <a href="/employee" class="btn btn-default"> Back</a>
              {{-- <button class="btn btn-default" type="button">Back</button> --}}
            </div>
           </div>
       
          </form>
        </div>
      </div>
    </section>
  </div>
</div>

@include('include.scripts')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('img-profile');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
      };



  $(document).ready( function () {
  
    
     $.ajaxSetup({
       headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
     });

    

     $(document).on("click", ".add-skill" , function(e) {
       e.preventDefault();
       var description = $('#register_form').find('input[name="expertise"]').val();
        if(description){
          $('.skills').append('<a href="javascript::void(0)" class="list-group-item list-group-item-action">'+description+'</a><input type="hidden" name="expertiselist[]" value="'+description+'"> ')
        }
        $('#register_form').find('input[name="expertise"]').val('');
     })

     $( '#register_form' ).submit( function( e ) {
      e.preventDefault();
        $.ajax( {
          url: '/employee/store',
          type: 'POST',
          data: new FormData( this ),
          processData: false,
          contentType: false,
          beforeSend:function(){
           //$('#employee-form').find('span').text('');
           $('#register_form').find('input').removeClass('error-input');
           $('#register_form').find('select').removeClass('error-input');
           },
           success:function(data){
            console.log(data);
            if(data.status === 200){
              $('.success-msg').html('<div class="alert alert-success fade in">\
                  <button data-dismiss="alert" class="close close-sm" type="button">\
                                      <i class="icon-remove"></i>\
                                  </button>\
                  <strong>Well done!</strong> '+data.message+'.\
                </div>');
                setTimeout(() => {
                    $('.success-msg').html('')
                  }, 5000);
             }else if(data.status === 400){
                     $.each(data.message, function(prefix,val){
                         $('#register_form').find('input[name="'+prefix+'"]').addClass('error-input');
                         $('#register_form').find('select[name="'+prefix+'"]').addClass('error-input');
                       // $('#employee-form').find('span.'+prefix+'_error').text(val[0]);
                     });
             }
            
          }
        } );
      } );


     //////////////////////////////////////////////

  //    $(document).on("click", ".btn-add" , function(e) {
  //      e.preventDefault();
  //      $('#fines-form').find('input[name="id"]').val('');
  //      $('#fines-form')[0].reset();
  //      $('#BillsModal').modal('show')
  //    })
 //;

  //    $(document).on("submit", "#fines-form" , function(e) {
  //    e.preventDefault();
  //    $.ajax({
  //        url:  '/fines/store',
  //        type: 'post',
  //        data: $('#fines-form').serialize(),
  //        beforeSend:function(){
  //          //$('#employee-form').find('span').text('');
  //          $('#fines-form').find('input').removeClass('is-invalid');
  //          //$('#fines-form').find('select').removeClass('is-invalid');
  //        },
  //        success:function(data){
  //          console.log(data);
  //            if(data.status === 200){
  //              toastr.success(data.message)
  //              $('#fines-table').DataTable().ajax.reload();
  //              $('#BillsModal').modal('hide')
  //            }else if(data.status === 400){
  //                    $.each(data.message, function(prefix,val){
                       
  //                        $('#fines-form').find('input[name="'+prefix+'"]').addClass('is-invalid');
  //                       // $('#fines-form').find('select[name="'+prefix+'"]').addClass('is-invalid');
  //                      // $('#employee-form').find('span.'+prefix+'_error').text(val[0]);
  //                    });
  //            }else if(data.status === 401){
  //             // $('.alertmessage').append('<div class="alert alert-danger-faded" role="alert">'+data.message+'!</div>')
  //            } 
  //           // $('.alert').delay(3000).fadeOut();
  //        }

  //    });
  //  });



  //  $(document).on("click", ".btn-edit" , function(e) {
  //    e.preventDefault();
  //    const id = $(this).data('id')
  //    getInfo(id);


  //  })

  //  $(document).on("click", ".btn-delete" , function(e) {
  //    e.preventDefault();
  //        const id = $(this).data('id')
  //        alerty.confirm(
  //                'Are you sure to this delete permanently??', 
  //                {title: 'Confirm!', cancelLabel: 'Cancel', okLabel: 'Confirm'}, 
  //                function(){
  //                  $.ajax({
  //                    url: '/fines/delete',
  //                    type: 'post',
  //                    data: {
  //                          id
  //                      },
  //                    dataType: 'json',
  //                    beforeSend:function(){
  //                      // $('.loading-select').html('<i class="spinner-border spinner-border-sm"></i> Loading... ');
  //                    },
  //                    success:function(result){
  //                        console.log('res: ', result);
  //                        if(result.status == 200){
  //                          $('#fines-table').DataTable().ajax.reload();
  //                            toastr.success(result.message)
  //                        }else{
  //                          toastr.error('Error: Please try again!')

  //                        }
  //                    }
  //                  })
  //                },
  //                function() {
  //                 // alerty.toasts('this is cancel callback')
  //                }
  //              )
                       

  //  })



  //  function getInfo(id){
  //        $.ajax({
  //          url: '/fines/one',
  //          type: 'post',
  //          data: {
  //                id
  //            },
  //          dataType: 'json',
  //          beforeSend:function(){
  //            $('#fines-form')[0].reset();
  //            // $('.loading-select').html('<i class="spinner-border spinner-border-sm"></i> Loading... ');
  //          },
  //          success:function(result){
  //              console.log('res: ', result);
  //              if(result.status == 200){
  //              $('#BillsModal').modal('show')
  //                $('#fines-form').find('input[name="id"]').val(result.data.id);
  //                $('#fines-form').find('input[name="description"]').val(result.data.description);
  //                $('#fines-form').find('input[name="amount"]').val(result.data.amount);
            
  //              }
  //          }
  //        })

  //      }







  });


 </script>
  
  @endsection