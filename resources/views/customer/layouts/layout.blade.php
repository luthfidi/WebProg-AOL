<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('admin_asset/images/logo/logo_elib.png')}}" type="image/x-icon" />
    <title>@yield('customer_title')</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('admin_asset/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/loading-bar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/morris.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/css/materialdesignicons.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin_asset/scss/_common.scss') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/scss/_default.scss') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/scss/_mixin.scss') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/scss/_preloader.scss') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/scss/_sidebar.scss') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/scss/_variables.scss') }}" />
    <link rel="stylesheet" href="{{ asset('admin_asset/scss/main.scss') }}" />
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <a href="{{ route('admin') }}">
            <img src="{{ asset('admin_asset/images/logo/logo_elib.png') }}" alt="logo" width="180" height="130"/>

        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li class="nav-item nav-item-has-children" {{request()->routeIs('dashboard') || request()->routeIs('history') || request()->routeIs('payment')?'active' : ''}}>
            <a
              href="#0"
              class="{{request()->routeIs('dashboard') || request()->routeIs('history') || request()->routeIs('payment')?'' : 'collapsed'}}"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_1"
              aria-controls="ddmenu_1"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                  <path
                    d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
                </svg>
              </span>
              <span class="text">Main</span>
            </a>
            <ul id="ddmenu_1" class="collapse {{request()->routeIs('dashboard') || request()->routeIs('history') || request()->routeIs('payment')?'show' : ''}} dropdown-nav">
              <li>
                <a href="{{ route('dashboard') }}"> Dashboard </a>
              </li>
              <li>
                <a href="{{ route('history') }}"> History </a>
              </li>
              <li>
                <a href="{{ route('payment') }}"> Payment </a>
              </li>
            </ul>
          </li>



          {{-- <li class="nav-item">
            <a href="notification.html">
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M10.8333 2.50008C10.8333 2.03984 10.4602 1.66675 9.99999 1.66675C9.53975 1.66675 9.16666 2.03984 9.16666 2.50008C9.16666 2.96032 9.53975 3.33341 9.99999 3.33341C10.4602 3.33341 10.8333 2.96032 10.8333 2.50008Z" />
                  <path
                    d="M17.5 5.41673C17.5 7.02756 16.1942 8.33339 14.5833 8.33339C12.9725 8.33339 11.6667 7.02756 11.6667 5.41673C11.6667 3.80589 12.9725 2.50006 14.5833 2.50006C16.1942 2.50006 17.5 3.80589 17.5 5.41673Z" />
                  <path
                    d="M11.4272 2.69637C10.9734 2.56848 10.4947 2.50006 10 2.50006C7.10054 2.50006 4.75003 4.85057 4.75003 7.75006V9.20873C4.75003 9.72814 4.62082 10.2393 4.37404 10.6963L3.36705 12.5611C2.89938 13.4272 3.26806 14.5081 4.16749 14.9078C7.88074 16.5581 12.1193 16.5581 15.8326 14.9078C16.732 14.5081 17.1007 13.4272 16.633 12.5611L15.626 10.6963C15.43 10.3333 15.3081 9.93606 15.2663 9.52773C15.0441 9.56431 14.8159 9.58339 14.5833 9.58339C12.2822 9.58339 10.4167 7.71791 10.4167 5.41673C10.4167 4.37705 10.7975 3.42631 11.4272 2.69637Z" />
                  <path
                    d="M7.48901 17.1925C8.10004 17.8918 8.99841 18.3335 10 18.3335C11.0016 18.3335 11.9 17.8918 12.511 17.1925C10.8482 17.4634 9.15183 17.4634 7.48901 17.1925Z" />
                </svg>
              </span>
              <span class="text">Notifications</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="promo-box">
        <div class="promo-icon">
          <img class="mx-auto" src="{{ asset('admin_asset/images/logo/logo-icon-big.svg') }}" alt="Logo">
        </div>
        <h3>Upgrade to PRO</h3>
        <p>Improve your development process and start doing more with PlainAdmin PRO!</p>
        <a href="https://plainadmin.com/pro" target="_blank" rel="nofollow" class="main-btn primary-btn btn-hover">
          Upgrade to PRO
        </a>
      </div> --}}
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-15">
                  <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                    <i class="lni lni-chevron-left me-2"></i> Menu
                  </button>
                </div>
                <div class="header-search d-none d-md-flex">
                  <form action="#">
                    <input type="text" placeholder="Search..." />
                    <button><i class="lni lni-search-alt"></i></button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
                <div class="header-right">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" style="background: transparent; color:red; border:none">Logout</button>

                    </form>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="title text-center ">
                  <h1 style="color: #84C4E8;">@yield('customer_title')</h1>
                </div>
              </div>
              @yield('customer_layout')
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->


    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('admin_asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('admin_asset/js/Chart.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/dynamic-pie-chart.js')}}"></script>
    <script src="{{asset('admin_asset/js/moment.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/fullcalendar.js')}}"></script>
    <script src="{{asset('admin_asset/js/jvectormap.min.js')}}"></script>
    <script src="{{asset('admin_asset/js/world-merc.js')}}"></script>
    <script src="{{asset('admin_asset/js/polyfill.js')}}"></script>
    <script src="{{asset('admin_asset/js/main.js')}}"></script>
  </body>
</html>
