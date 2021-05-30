
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
      <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link rel="icon" href="{{ url('asset/img/favicon.png')}}" type="image/png" />
         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->

        <title>About Us</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url('asset/css/bootstrap.css')}}" />
        <link rel="stylesheet" href="{{ url('asset/css/flaticon.css')}}"/>
        <link rel="stylesheet" href="{{ url('asset/css/themify-icons.css')}}"/>
        <link rel="stylesheet" href="{{ url('asset/vendors/owl-carousel/owl.carousel.min.css')}}"/>
        <link rel="stylesheet" href="{{ url('asset/vendors/nice-select/css/nice-select.css')}}"/>
        <!-- main css -->
        <link rel="stylesheet" href="{{ url('asset/css/style.css')}}"/>
         <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      </head>

<body>
    <header class="header_area white-header navbar_fixed" >
        <div class="main_menu">


          <nav class="navbar navbar-expand-lg" style="background: #002347 !important">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <a class="navbar-brand" href="/">
                <img class="logo-2" src="{{ url('asset/img/logo2.png')}}" alt="" />
              </a>
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="icon-bar"></span> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div
                class="collapse navbar-collapse offset"
                id="navbarSupportedContent"
              >
                <ul class="nav navbar-nav menu_nav ml-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="/about-us">About</a>
                  </li>

                  @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))

                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </div>
                  </li>
              @endguest

                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>

      <main class="py-4">
            @yield('content')
        </main>


    <!--================ End Header Menu Area =================-->

    <!--================Home Banner Area =================-->

<footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Top Products</h4>
          <ul>
            <li><a href="#">Managed Website</a></li>

          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="#">Jobs</a></li>

          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Features</h4>
          <ul>
            <li><a href="#">Jobs</a></li>

          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Resources</h4>
          <ul>
            <li><a href="#">Guides</a></li>

          </ul>
        </div>
        <div class="col-lg-4 col-md-6 single-footer-widget">
          <h4>Newsletter</h4>
          <p>Please use your email we will update you the price of ciment every day</p>
          <div class="form-wrap" id="mc_embed_signup">
            <form
              target="_blank"

              class="form-inline"
            >
              <input
                class="form-control"
                name="EMAIL"
                placeholder="Your Email Address"
                onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Your Email Address'"
                required=""
                type="email"
              />
              <button class="click-btn btn btn-default">
                <span>subscribe</span>
              </button>


              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="row footer-bottom d-flex justify-content-between">
        <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |YAnjye.com <i class="ti-heart" aria-hidden="true"></i> by <a href="https://yanjye.com" target="_blank">Yanjye limited</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
        <div class="col-lg-4 col-sm-12 footer-social">
          <a href="#"><i class="ti-facebook"></i></a>
          <a href="#"><i class="ti-twitter"></i></a>
          <a href="#"><i class="ti-dribbble"></i></a>
          <a href="#"><i class="ti-linkedin"></i></a>
        </div>
      </div>
    </div>
  </footer>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ url('asset/js/jquery-3.2.1.min.js')}}"></script>
  <script src="{{ url('asset/js/popper.js')}}"></script>
  <script src="{{ url('asset/js/bootstrap.min.js')}}"></script>
  <script src="{{ url('asset/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
  <script src="{{ url('asset/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{ url('asset/js/owl-carousel-thumb.min.js')}}"></script>
  <script src="{{ url('asset/js/jquery.ajaxchimp.min.js')}}"></script>

  <!--gmaps Js-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
  <script src="{{ url('asset/js/gmaps.min.js')}}"></script>
  <script src="{{ url('asset/js/theme.js')}}"></script>
</body>
</html>


