<!DOCTYPE html>
<html lang="en">
 <head>
      <meta charset="utf-8">
      <meta name="description" content="Code written by bazimya  safan or saphani yanjye.com@gmail.com">
      <link rel="shortcut icon" type="image/png" href="../asset/log.png">


      <title>
        @yield('title')
      </title>
      <!-- =============== VENDOR STYLES ===============-->
      <!-- FONT AWESOME-->
      <link rel="stylesheet" href="{{ url('asset/admin/vendor/@fortawesome/fontawesome-free-webfonts/css/fa-brands.css')}}">
      <link rel="stylesheet" href="{{ url('asset/admin/vendor/@fortawesome/fontawesome-free-webfonts/css/fa-regular.css')}}">
      <link rel="stylesheet" href="{{ url('asset/admin/vendor/@fortawesome/fontawesome-free-webfonts/css/fa-solid.css')}}">
      <link rel="stylesheet" href="{{ url('asset/admin/vendor/@fortawesome/fontawesome-free-webfonts/css/fontawesome.css')}}">
      <!-- SIMPLE LINE ICONS-->
      <link rel="stylesheet" href="{{ url('asset/admin/vendor/simple-line-icons/css/simple-line-icons.css')}}">
      <!-- ANIMATE.CSS-->
      <link rel="stylesheet" href="{{ url('asset/admin/vendor/animate.css/animate.css')}}">
      <!-- WHIRL (spinners)-->
      <link rel="stylesheet" href="{{ url('asset/admin/vendor/whirl/dist/whirl.css')}}">
      <!-- =============== PAGE VENDOR STYLES ===============-->
      <!-- WEATHER ICONS-->
      <link rel="stylesheet" href="{{ url('asset/admin/vendor/weather-icons/css/weather-icons.css')}}">
      <!-- =============== BOOTSTRAP STYLES ===============-->
      <link rel="stylesheet" href="{{ url('asset/admin/css/bootstrap.css')}}">
      <!-- =============== APP STYLES ===============-->
      <link rel="stylesheet" href="{{ url('asset/admin/css/app.css' )}}">
      {{-- datatables --}}

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css"/>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"/>

   </head>

   <body>
    <div class="wrapper">
        <!-- top navbar-->
        <header class="topnavbar-wrapper">
           <!-- START Top Navbar-->
           <nav class="navbar topnavbar">
              <!-- START navbar header-->
              <div class="navbar-header">
                 <a class="navbar-brand" href="/dashboard">
                    <div class="brand-logo">
                       <img class="img-fluid"  src="{{ url('asset/img/logo2.png')}}"  style=" ;border-radius: 15%;" alt="App Logo">
                    </div>
                    <div class="brand-logo-collapsed">
                       <img class="img-fluid"  src="{{ url('asset/img/logo2.png')}}"  style=" ;border-radius: 15%;" alt="App Logo">
                    </div>
                 </a>
              </div>
              <!-- END navbar header-->
              <!-- START Left navbar-->
              <ul class="navbar-nav mr-auto flex-row">
                 <li class="nav-item">
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed">
                       <em class="fas fa-bars"></em>
                    </a>
                    <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                    <a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
                       <em class="fas fa-bars"></em>
                    </a>
                 </li>
                 <!-- START User avatar toggle-->
                 <li class="nav-item d-none d-md-block">
                    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                    <a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse">
                       <em class="icon-user"></em>
                    </a>
                 </li>
                 <!-- END User avatar toggle-->
                 <!-- START lock screen-->
                 <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="{{ route('logout') }}" title="Logout" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                        <em class="icon-lock"></em>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                 </li>

                 <!-- END lock screen-->
              </ul>
              <!-- END Left navbar-->
              <!-- START Right Navbar-->
              <ul class="navbar-nav flex-row">
                 <!-- Search icon-->
                 <li class="nav-item">
                    <a class="nav-link" href="#" data-search-open="">
                       <em class="icon-magnifier"></em>
                    </a>
                 </li>
                 <!-- Fullscreen (only desktops)-->
                 <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="#" data-toggle-fullscreen="">
                       <em class="fas fa-expand"></em>
                    </a>
                 </li>
                 <!-- START Alert menu-->
                 <li class="nav-item dropdown dropdown-list">


                 </li>
                 <!-- END Alert menu-->
                 <!-- START Offsidebar button-->
                 <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                       <em class="icon-notebook"></em>
                    </a>
                 </li>
                 <!-- END Offsidebar menu-->
              </ul>
              <!-- END Right Navbar-->
              <!-- START Search form-->
              <form class="navbar-form" role="search" action="http://themicon.co/theme/angle/v4.0/static-html/app/search.html">
                 <div class="form-group">
                    <input class="form-control" type="text" placeholder="Type and hit enter ...">
                    <div class="fas fa-times navbar-form-close" data-search-dismiss=""></div>
                 </div>
                 <button class="d-none" type="submit">Submit</button>
              </form>
              <!-- END Search form-->
           </nav>
           <!-- END Top Navbar-->
        </header>
        <!-- sidebar-->
        <aside class="aside-container">
           <!-- START Sidebar (left)-->
           <div class="aside-inner">
              <nav class="sidebar" data-sidebar-anyclick-close="">
                 <!-- START sidebar nav-->
                 <ul class="sidebar-nav">
                    <!-- START user info-->
                    <li class="has-user-block">
                       <div class="collapse" id="user-block">
                          <div class="item user-block">
                             <!-- User picture-->
                             <div class="user-block-picture">
                                <div class="user-block-status">
                                   <img class="img-thumbnail rounded-circle" src="asset/admin/img/user/02.jpg" alt="Avatar" width="60" height="60">
                                   <div class="circle bg-success circle-lg"></div>
                                </div>
                             </div>
                             <!-- Name and Job-->
                             <div class="user-block-info" style="margin-top:20px">
                                <span class="user-block-name">{{ Auth::user()->name }}</span>

                                 <span class="user-block-name">{{ Auth::user()->email }}</span>

                             </div>
                          </div>
                       </div>
                    </li>
                    <!-- END user info-->
                    <!-- Iterates over all sidebar items-->
                    <li class="nav-heading ">
                       <span data-localize="sidebar.heading.HEADER">User profile</span>
                    </li>
                    <li class=" ">
                       <a href="/dashboard" title="Dashboard" data-toggle="collapse">
                          {{-- <div class="float-right badge badge-success">3</div> --}}
                          <a href="/dashboard"> <em class="icon-speedometer"></em>
                            <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span></a>

                       </a>
                       <ul class="sidebar-nav sidebar-subnav collapse" id="dashboard">
                          <li class="sidebar-subnav-header">Dashboard</li>
                          <li class=" ">
                             <a href="/dashboard" title="Dashboard">
                                <span>Dashboard</span>
                             </a>
                          </li>
                       </ul>
                    </li>

                        @if (Auth::user()->user_type == "retailer")
                        <li class="">
                            <a href="/soldeout"> <i class="fa fa-home" aria-hidden="true"></i>
                                <span data-localize="sidebar.nav.DASHBOARD">Remove ciment</span>
                            </a>

                        <ul class="sidebar-nav sidebar-subnav collapse">
                            <li class="sidebar-subnav-header">Remove Ciment</li>
                        </ul>
                        </li>
                        <li class=" ">
                            <a href="/ACCEPTCIMENT"> <i class="fa fa-users" aria-hidden="true"></i><span data-localize="sidebar.nav.DASHBOARD">Accept Ciment from Headqouter</span></a>
                            <ul class="sidebar-nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Accept Ciment from Headqouter</li>
                            </ul>
                        </li>
                        <li class=" ">
                            <a href="/Cimententsold"> <i class="fa fa-users" aria-hidden="true"></i><span data-localize="sidebar.nav.DASHBOARD">Ciment Sold</span></a>
                            <ul class="sidebar-nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Ciment Remove </li>
                            </ul>
                        </li>
                        @endif

                        @if (Auth::user()->user_type =='admin' )
                        <li class=" ">
                            <a href="/Edituser"> <i class="fa fa-check" aria-hidden="true"></i>
                                <span data-localize="sidebar.nav.DASHBOARD">Edit user</span></a>
                            <ul class="sidebar-nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Edit user</li>
                            </ul>
                        </li>
                        <li class=" ">
                            <a href="/Orderciment">
                             <i class="fa fa-list-alt" aria-hidden="true"></i>
                             <span data-localize="sidebar.nav.DASHBOARD">Orderd ciment</span></a>

                         <ul class="sidebar-nav sidebar-subnav collapse">
                            <li class="sidebar-subnav-header">Orderd ciment</li>
                         </ul>
                      </li>


                        @elseif(Auth::user()->user_type =='Superadmin')
                        <li class=" ">
                            <a href="/Edituser"> <i class="fa fa-check" aria-hidden="true"></i>
                                <span data-localize="sidebar.nav.DASHBOARD">Edit user</span></a>
                            <ul class="sidebar-nav sidebar-subnav collapse">
                                <li class="sidebar-subnav-header">Edit user</li>
                            </ul>
                        </li>

                        <li class=" ">
                            <a href="/Orderciment">
                             <i class="fa fa-list-alt" aria-hidden="true"></i>
                             <span data-localize="sidebar.nav.DASHBOARD">Orderd ciment</span></a>

                         <ul class="sidebar-nav sidebar-subnav collapse">
                            <li class="sidebar-subnav-header">Order Ciment</li>
                         </ul>
                      </li>
                      <li class=" ">
                        <a href="/Newstocker"> <i class="fa fa-check" aria-hidden="true"></i>
                            <span data-localize="sidebar.nav.DASHBOARD">Create New Stocker</span></a>
                        <ul class="sidebar-nav sidebar-subnav collapse">
                            <li class="sidebar-subnav-header">New Stocker</li>
                        </ul>
                    </li>
                        @endif


                 </ul>
                 <!-- END sidebar nav-->
              </nav>
           </div>
           <!-- END Sidebar (left)-->
        </aside>
        <!-- Main section-->
            @yield('contain')
        <!-- Page footer-->
        <footer class="footer-container">
           <span>&copy; 2020 yanjye limited</span>
        </footer>
     </div>
      <!-- =============== VENDOR SCRIPTS ===============-->
      <!-- MODERNIZR-->
      <script src="{{ url('asset/admin/vendor/jquery/dist/jquery.js')}}"></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>


        <script src="{{ url('asset/admin/js/bazimya.js')}}"></script>


   </body>


   <!-- Mirrored from themicon.co/theme/angle/v4.0/static-html/app/dashboard_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Nov 2018 12:42:18 GMT -->
   </html>
