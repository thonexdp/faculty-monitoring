<aside>
    <div id="sidebar" class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu">
        @if(session('usertype') == 1)
        <li class="{{ request()->is('dashboard') ? 'active' : ''}}">
          <a class="" href="/dashboard">
                        <i class="icon_house_alt"></i>
                        <span>Dashboard</span>
                    </a>
        </li>
        <li class="{{ request()->is('employee') ? 'active' : ''}}">
          <a class="" href="/employee">
                        <i class="icon_genius"></i>
                        <span>Faculty</span>
                    </a>
        </li>
        <li class="{{ request()->is('schedule') ? 'active' : ''}}">
          <a class="" href="/designation">
                        <i class="icon_genius"></i>
                        <span>Designation</span>
                    </a>
        </li>
        <li class="{{ request()->is('itemname') ? 'active' : ''}}">
          <a class="" href="/itemname">
                        <i class="icon_genius"></i>
                        <span>ItemName</span>
                    </a>
        </li>
        <li class="{{ request()->is('account') ? 'active' : ''}}">
          <a class="" href="/account">
                        <i class="icon_genius"></i>
                        <span>Accounts</span>
                    </a>
        </li>
        @endif
        @if(session('usertype') == 2)
        <li class="{{ request()->is('account') ? 'active' : ''}}">
          <a class="" href="/faculty">
                        <i class="icon_genius"></i>
                        <span>Dashboard</span>
                    </a>
        </li>
        @endif
        @if(session('usertype') == 3)
        <li class="{{ request()->is('account') ? 'active' : ''}}">
          <a class="" href="/dean">
                        <i class="icon_genius"></i>
                        <span>Dashboard</span>
                    </a>
        </li>
        @endif
      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>