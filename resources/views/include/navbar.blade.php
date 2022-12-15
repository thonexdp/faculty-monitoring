<header class="header dark-bg">
    <div class="toggle-nav">
      <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <?php
      $role = '';
      if(session('usertype') == 1){
        $role = 'Admin';
      }else if(session('usertype') == 3){
        $role = 'Faculty';
      }else if(session('usertype') == 2){
        $role = 'Dean';
     }
    ?>
    <a href="index.html" class="logo">Faculty Monitoring <span class="lite">- {{ $role }}</span></a>
  

    <div class="top-nav notification-row">
      <!-- notificatoin dropdown start-->
      <ul class="nav pull-right top-menu">

      
        <!-- user login dropdown start-->
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <span class="profile-ava">
                              <img alt="" src="{{ empty(session('photo'))?asset('img/emptyprofile.png'):asset('storage/images/'.session('photo')) }}" width="35">
                          </span>
                          <span class="username">{{session('firstname')." ".session('lastname')}}</span>
                          <b class="caret"></b>
                      </a>
          <ul class="dropdown-menu extended logout">
            <div class="log-arrow-up"></div>
            <li class="eborder-top">
              <a href="#" class="myprofile"><i class="icon_profile"></i> My Profile</a>
            </li>
            {{-- <li>
              <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
            </li>
            <li>
              <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
            </li>
            <li>
              <a href="#"><i class="icon_chat_alt"></i> Chats</a>
            </li> --}}
            <li>
              <a href="/logout"><i class="icon_key_alt"></i> Log Out</a>
            </li>
            {{-- <li>
              <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
            </li>
            <li>
              <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
            </li> --}}
          </ul>
        </li>
        <!-- user login dropdown end -->
      </ul>
      <!-- notificatoin dropdown end-->
    </div>
  </header>
  <!--header end-->
  <div class="modal fade" id="MyProfileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">My Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="myform">
        <div class="modal-body">
         
            <input type="hidden" name="id" value="{{session('id')}}" >
            <div class="row" style="margin: 20px;">
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Firstnme</label>
                  <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter FirstName" value="{{session('firstname')}}">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Lastnme</label>
                  <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter LastName" value="{{session('lastname')}}">
                </div>
              </div>
            </div>

            <div class="row" style="margin: 20px;">
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username" value="{{session('username')}}">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="exampleInputEmail1">Password <i class="text-warning">Leave Empty if No changes</i></label>
                  <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Leave Blank if no changes">
                </div>
              </div>
            </div>
           <div class="row">
            <div class="col-md-12">
              <div class="return-msg"></div>
            </div>
           </div>
         
        </div>
        <div class="modal-footer mt-4">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary save-d">Save</button>
        </div>
      </form>
      </div>
    </div>
  </div>




<script src="js/jquery.js"></script>
<script src="js/jquery-ui-1.10.4.min.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
<!-- bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- charts scripts -->
<script src="assets/jquery-knob/js/jquery.knob.js"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js"></script>
<!-- jQuery full calendar -->
<<script src="js/fullcalendar.min.js"></script>
  <!-- Full Google Calendar - Calendar -->
  <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
  <!--script for this page only-->
  <script src="js/calendar-custom.js"></script>
  <script src="js/jquery.rateit.min.js"></script>
  <!-- custom select -->
  <script src="js/jquery.customSelect.min.js"></script>
  <script src="assets/chart-master/Chart.js"></script>

  <!--custome script for all page-->
  <script src="js/scripts.js"></script>
  <!-- custom script for this page-->
  <script src="js/sparkline-chart.js"></script>
  <script src="js/easy-pie-chart.js"></script>
  <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="js/xcharts.min.js"></script>
  <script src="js/jquery.autosize.min.js"></script>
  <script src="js/jquery.placeholder.min.js"></script>
  <script src="js/gdp-data.js"></script>
  <script src="js/morris.min.js"></script>
  <script src="js/sparklines.js"></script>
  <script src="js/charts.js"></script>
  <script src="js/jquery.slimscroll.min.js"></script>
  <script>
    $(document).ready( function () {
        $.ajaxSetup({
        headers: {  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });



        $(document).on("click", ".myprofile" , function(e) {
          e.preventDefault();
          //$('input[name="d_id"]').val('')
          $('#MyProfileModal').modal('show')

        })


        $(document).on("submit", "#myform" , function(e) {
              e.preventDefault();
                $.ajax({
                  url:  '/account/update',
                  type: 'post',
                  data: $('#myform').serialize(),
                  beforeSend:function(){
                    //$('#employee-form').find('span').text('');
                    $('#myform').find('input').removeClass('is-invalid');
                   // $('#myform').find('select').removeClass('is-invalid');
                  },
                  success:function(data){
                    console.log(data);
                      if(data.status === 200){
                        $('.return-msg').html('<div class="alert alert-success fade in">\
                                        <button data-dismiss="alert" class="close close-sm" type="button">\
                                                            <i class="icon-remove"></i>\
                                                        </button>\
                                        <strong>Well done!</strong> '+data.message+'.\
                                      </div>');
                      }else if(data.status === 400){
                              $.each(data.message, function(prefix,val){
                                
                                  $('#myform').find('input[name="'+prefix+'"]').addClass('is-invalid');
                               //   $('#myform').find('select[name="'+prefix+'"]').addClass('is-invalid');
                                // $('#employee-form').find('span.'+prefix+'_error').text(val[0]);
                              });
                      }else if(data.status === 401){
                        $('.return-msg').html('<div class="alert alert-danger fade in">\
                                    <button data-dismiss="alert" class="close close-sm" type="button">\
                                                        <i class="icon-remove"></i>\
                                                    </button>\
                                    <strong>Error!</strong> '+data.message+'.\
                                  </div>');
                      } 
                     // $('.alert').delay(3000).fadeOut();
                  }

                });
              });



     });



  </script>
  <script>
    //knob
    $(function() {
      $(".knob").knob({
        'draw': function() {
          $(this.i).val(this.cv + '%')
        }
      })
    });

    //carousel
    $(document).ready(function() {
      $("#owl-slider").owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true

      });
    });

    //custom select box

    $(function() {
      $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function() {
      $('#map').vectorMap({
        map: 'world_mill_en',
        series: {
          regions: [{
            values: gdpData,
            scale: ['#000', '#000'],
            normalizeFunction: 'polynomial'
          }]
        },
        backgroundColor: '#eef3f7',
        onLabelShow: function(e, el, code) {
          el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
        }
      });
    });
  </script>