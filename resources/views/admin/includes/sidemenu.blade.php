<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{url('admin/index')}}" class="logo">
            <span class="logo-light">
                    <i class="mdi mdi-camera-control"></i> Sharpower
                </span>
            <span class="logo-sm">
                    <i class="mdi mdi-camera-control"></i>
                </span>
        </a>
    </div>
    <nav class="navbar-custom">
        <ul class="navbar-right list-inline float-right mb-0">
            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('public/customer/images/users/user-4.jpg')}}" alt="user" class="rounded-circle">
                        @if(Auth::user())
                        {{Auth::user()->name}} 
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <a class="dropdown-item" href="{{url('admin/profile')}}"><i class="mdi mdi-account-circle"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{url('logout')}}"><i class="mdi mdi-power text-danger"></i> Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
    
    </div>
    
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">
    
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="{{url('admin/index')}}" class="waves-effect">
                            <i class="icon-accelerator"></i> <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('admin/roles')}}" class="waves-effect"><i class="fa fa-tasks"></i><span> Roles</span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/users')}}" class="waves-effect"><i class="fa fa-user"></i><span> Admin users</span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/customers')}}" class="waves-effect"><i class="fa fa-user"></i><span> Customers</span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/transactions')}}" class="waves-effect"><i class="fa fa-credit-card"></i><span> All transactions </span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/electricity_transactions')}}" class="waves-effect"><i class="fa fa-credit-card"></i><span> Electricity transactions </span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/airtime_transactions')}}" class="waves-effect"><i class="fa fa-credit-card"></i><span> Airtime transactions </span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/data_transactions')}}" class="waves-effect"><i class="fa fa-credit-card"></i><span> Data transactions </span></a>
                    </li>
                    <li>
                        <a href="{{url('admin/tv_transactions')}}" class="waves-effect"><i class="fa fa-credit-card"></i><span> TV transactions </span></a>
                    </li>
                    
                </ul>
    
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>
    
        </div>
        <!-- Sidebar -left -->
    
    </div>
    <!-- Left Sidebar End -->
    