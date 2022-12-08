<header class="header dark-bg">
    <div class="toggle-nav">
      <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <!--logo start-->
    <?php
      $role = '';
      if(session('usertype') == 1){
        $role = 'Admin';
      }else if(session('usertype') == 2){
        $role = 'Faculty';
      }else if(session('usertype') == 3){
        $role = 'Dean';
     }
    ?>
    <a href="index.html" class="logo">Faculty Monitoring <span class="lite">- {{ $role }}</span></a>
    <!--logo end-->

    {{-- <div class="nav search-row" id="top_menu">
      <!--  search form start -->
      <ul class="nav top-menu">
        <li>
          <form class="navbar-form">
            <input class="form-control" placeholder="Search" type="text">
          </form>
        </li>
      </ul>
      <!--  search form end -->
    </div> --}}

    <div class="top-nav notification-row">
      <!-- notificatoin dropdown start-->
      <ul class="nav pull-right top-menu">

        <!-- task notificatoin start -->
        {{-- <li id="task_notificatoin_bar" class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <i class="icon-task-l"></i>
                          <span class="badge bg-important">6</span>
                      </a>
          <ul class="dropdown-menu extended tasks-bar">
            <div class="notify-arrow notify-arrow-blue"></div>
            <li>
              <p class="blue">You have 6 pending letter</p>
            </li>
            <li>
              <a href="#">
                <div class="task-info">
                  <div class="desc">Design PSD </div>
                  <div class="percent">90%</div>
                </div>
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                    <span class="sr-only">90% Complete (success)</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="task-info">
                  <div class="desc">
                    Project 1
                  </div>
                  <div class="percent">30%</div>
                </div>
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                    <span class="sr-only">30% Complete (warning)</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="task-info">
                  <div class="desc">Digital Marketing</div>
                  <div class="percent">80%</div>
                </div>
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80% Complete</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="task-info">
                  <div class="desc">Logo Designing</div>
                  <div class="percent">78%</div>
                </div>
                <div class="progress progress-striped">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%">
                    <span class="sr-only">78% Complete (danger)</span>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div class="task-info">
                  <div class="desc">Mobile App</div>
                  <div class="percent">50%</div>
                </div>
                <div class="progress progress-striped active">
                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">50% Complete</span>
                  </div>
                </div>

              </a>
            </li>
            <li class="external">
              <a href="#">See All Tasks</a>
            </li>
          </ul> 
        </li> --}}
        <!-- task notificatoin end -->
        <!-- inbox notificatoin start-->
        {{-- <li id="mail_notificatoin_bar" class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <i class="icon-envelope-l"></i>
                          <span class="badge bg-important">5</span>
                      </a>
          <ul class="dropdown-menu extended inbox">
            <div class="notify-arrow notify-arrow-blue"></div>
            <li>
              <p class="blue">You have 5 new messages</p>
            </li>
            <li>
              <a href="#">
                                  <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                                  <span class="subject">
                                  <span class="from">Greg  Martin</span>
                                  <span class="time">1 min</span>
                                  </span>
                                  <span class="message">
                                      I really like this admin panel.
                                  </span>
                              </a>
            </li>
            <li>
              <a href="#">
                                  <span class="photo"><img alt="avatar" src="./img/avatar-mini2.jpg"></span>
                                  <span class="subject">
                                  <span class="from">Bob   Mckenzie</span>
                                  <span class="time">5 mins</span>
                                  </span>
                                  <span class="message">
                                   Hi, What is next project plan?
                                  </span>
                              </a>
            </li>
            <li>
              <a href="#">
                                  <span class="photo"><img alt="avatar" src="./img/avatar-mini3.jpg"></span>
                                  <span class="subject">
                                  <span class="from">Phillip   Park</span>
                                  <span class="time">2 hrs</span>
                                  </span>
                                  <span class="message">
                                      I am like to buy this Admin Template.
                                  </span>
                              </a>
            </li>
            <li>
              <a href="#">
                                  <span class="photo"><img alt="avatar" src="./img/avatar-mini4.jpg"></span>
                                  <span class="subject">
                                  <span class="from">Ray   Munoz</span>
                                  <span class="time">1 day</span>
                                  </span>
                                  <span class="message">
                                      Icon fonts are great.
                                  </span>
                              </a>
            </li>
            <li>
              <a href="#">See all messages</a>
            </li>
          </ul>
        </li> --}}
        <!-- inbox notificatoin end -->
        <!-- alert notification start-->
        {{-- <li id="alert_notificatoin_bar" class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                          <i class="icon-bell-l"></i>
                          <span class="badge bg-important">7</span>
                      </a>
          <ul class="dropdown-menu extended notification">
            <div class="notify-arrow notify-arrow-blue"></div>
            <li>
              <p class="blue">You have 4 new notifications</p>
            </li>
            <li>
              <a href="#">
                                  <span class="label label-primary"><i class="icon_profile"></i></span>
                                  Friend Request
                                  <span class="small italic pull-right">5 mins</span>
                              </a>
            </li>
            <li>
              <a href="#">
                                  <span class="label label-warning"><i class="icon_pin"></i></span>
                                  John location.
                                  <span class="small italic pull-right">50 mins</span>
                              </a>
            </li>
            <li>
              <a href="#">
                                  <span class="label label-danger"><i class="icon_book_alt"></i></span>
                                  Project 3 Completed.
                                  <span class="small italic pull-right">1 hr</span>
                              </a>
            </li>
            <li>
              <a href="#">
                                  <span class="label label-success"><i class="icon_like"></i></span>
                                  Mick appreciated your work.
                                  <span class="small italic pull-right"> Today</span>
                              </a>
            </li>
            <li>
              <a href="#">See all notifications</a>
            </li>
          </ul>
        </li> --}}
        <!-- alert notification end-->
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
        <div class="modal-body">
          <form>
            <input type="hidden" name="d_id">
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
                  <input type="password" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Leave Blank if no changes">
                </div>
              </div>
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