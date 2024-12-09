<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('admin_asset/images/logo/logo_elib.png') }}" type="image/x-icon" />
    <title>@yield('librarian_title') - Librarian Panel</title>

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
    @livewireStyles
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
            <a href="{{ route('librarian') }}">
                <img src="{{ asset('admin_asset/images/logo/logo_elib.png') }}" alt="logo" width="180" height="130"/>
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="nav-item nav-item-has-children"
                    {{ request()->routeIs('librarian') || request()->routeIs('librarian.order.history') ? 'active' : '' }}>
                    <a href="#0"
                        class="{{ request()->routeIs('librarian') || request()->routeIs('librarian.order.history') ? '' : 'collapsed' }}"
                        data-bs-toggle="collapse" data-bs-target="#ddmenu_1" aria-controls="ddmenu_1"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                                <path
                                    d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
                            </svg>
                        </span>
                        <span class="text">Main</span>
                    </a>
                    <ul id="ddmenu_1"
                        class="collapse {{ request()->routeIs('librarian') || request()->routeIs('librarian.order.history') ? 'show' : '' }} dropdown-nav">
                        <li>
                            <a href="{{ route('librarian') }}"> Dashboard </a>
                        </li>
                        <li>
                            <a href="{{ route('librarian.order.history') }}"> Order History </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-has-children"
                    {{ request()->routeIs('librarian.store') || request()->routeIs('librarian.store.manage') ? 'active' : '' }}>
                    <a href="#0"
                        class="{{ request()->routeIs('librarian.store') || request()->routeIs('librarian.store.manage') ? '' : 'collapsed' }}"
                        data-bs-toggle="collapse" data-bs-target="#ddmenu_2" aria-controls="ddmenu_2"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                                <path
                                    d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
                            </svg>
                        </span>
                        <span class="text">Store</span>
                    </a>
                    <ul id="ddmenu_2"
                        class="collapse {{ request()->routeIs('librarian.store') || request()->routeIs('librarian.store.manage') ? 'show' : '' }} dropdown-nav">
                        <li>
                            <a href="{{ route('librarian.store') }}"> Create </a>
                        </li>
                        <li>
                            <a href="{{ route('librarian.store.manage') }}"> Manage </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item-has-children"
                    {{ request()->routeIs('librarian.product') || request()->routeIs('librarian.product.manage') ? 'active' : '' }}>
                    <a href="#0"
                        class="{{ request()->routeIs('librarian.product') || request()->routeIs('librarian.product.manage') ? '' : 'collapsed' }}"
                        data-bs-toggle="collapse" data-bs-target="#ddmenu_3" aria-controls="ddmenu_3"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                                <path
                                    d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
                            </svg>
                        </span>
                        <span class="text">Product</span>
                    </a>
                    <ul id="ddmenu_3"
                        class="collapse {{ request()->routeIs('librarian.product') || request()->routeIs('librarian.product.manage') ? 'show' : '' }} dropdown-nav">
                        <li>
                            <a href="{{ route('librarian.product') }}"> Create </a>
                        </li>
                        <li>
                            <a href="{{ route('librarian.product.manage') }}"> Manage </a>
                        </li>
                    </ul>
                </li>



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
            </div>
        </header>
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2>@yield('librarian_title')</h2>
                            </div>
                        </div>
                        <!-- end col -->
                        {{-- <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Page
                      </li>
                    </ol>
                  </nav>
                </div>
              </div> --}}
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->

                @yield('librarian_layout')
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('admin_asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/dynamic-pie-chart.js') }}"></script>
    <script src="{{ asset('admin_asset/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('admin_asset/js/jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/world-merc.js') }}"></script>
    <script src="{{ asset('admin_asset/js/polyfill.js') }}"></script>
    <script src="{{ asset('admin_asset/js/main.js') }}"></script>
    @livewireScripts
</body>

</html>
