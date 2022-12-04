<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
 
  <title>Login | Faculty Monitoring</title>
  <!-- Bootstrap CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{asset('css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{asset('css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
 
</head>

<body class="login-img-bodysdf">
  <div class="container">
    <form class="login-form" id="loginform">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-danger alertmessage"></p>
            </div>
        </div>
        
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      </div>
    </form>
   
  </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready( function () {
     $.ajaxSetup({
       headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
     });
     $(document).on("submit", "#loginform" , function(e) {
                  e.preventDefault();
                  console.log('asdsadsad');
                  $.ajax({
                      url:  '/login',
                      type: 'post',
                      data: $('#loginform').serialize(),
                      beforeSend:function(){
                        // //$('#employee-form').find('span').text('');
                        // $('#login-form').find('input').removeClass('is-invalid');
                        // $('#login-form').find('select').removeClass('is-invalid');
                      },
                      success:function(data){
                        console.log(data);
                          if(data.status === 200){
                            window.location.href = data.url;
                          }else{
                           $('.alertmessage').html('<div class="alert alert-danger fade in">\
                                        <button data-dismiss="alert" class="close close-sm" type="button">\
                                                            <i class="icon-remove"></i>\
                                                        </button>\
                                           '+data.message+'.\
                                        </div>');
                           setTimeout(() => {
                            $('.alertmessage').html('')
                           }, 4000);
                          } 
                       
                      }

                  });
               });



    
    });


</script>
</html>
