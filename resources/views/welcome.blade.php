<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyLib - Your Digital Library Solution</title>
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
    <style>
        :root {
            --custom-blue: #84C4E8;
        }
        
        .navbar {
            background-color: var(--custom-blue);
        }

        .navbar-brand img {
            filter: brightness(0);
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--custom-blue), #0d6efd);
            padding: 100px 0;
            color: white;
        }
        
        .features-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }
        
        .feature-card {
            border: none;
            transition: transform 0.3s ease;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        .btn-custom {
            background-color: var(--custom-blue);
            border: none;
            color: white;
        }
        
        .btn-custom:hover {
            background-color: #6db0d4;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('admin_asset/images/logo/logo_elib.png') }}" alt="EasyLib Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                @if (Route::has('login'))
                    <div class="navbar-nav">
                        @auth
                            <a class="nav-link btn btn-light text-dark px-3 mx-2" href="{{ url('/dashboard') }}"><strong>Dashboard</strong></a>
                        @else
                            <a class="nav-link btn btn-light text-dark px-3 mx-2" href="{{ route('login') }}"><strong>Log in</strong></a>
                            @if (Route::has('register'))
                                <a class="nav-link btn btn-outline-light px-3 mx-2" href="{{ route('register') }}"><strong>Register</strong></a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Welcome to EasyLib</h1>
            <p class="lead mb-5">Your Digital Gateway to a World of Books - Delivered Right to Your Doorstep</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('register') }}" class="btn btn-light btn-lg px-4">Get Started</a>
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg px-4">Learn More</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <h2 class="text-center mb-5">How EasyLib Works</h2>
            <div class="row g-4">
                <!-- For Customers -->
                <div class="col-md-6">
                    <div class="card feature-card shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="card-title text-primary mb-4">For Readers</h3>
                            <div class="card-text">
                                <p class="mb-3">Experience a revolutionary way to access your favorite books:</p>
                                <ul class="list-unstyled">
                                    <li class="mb-3">📚 Browse through our extensive collection of books from various libraries</li>
                                    <li class="mb-3">🚚 Enjoy convenient doorstep delivery of your chosen books</li>
                                    <li class="mb-3">💳 Simple and secure payment process</li>
                                    <li class="mb-3">📦 Easy return process once you're finished reading</li>
                                </ul>
                            </div>
                            <a href="{{ route('register') }}" class="btn btn-custom mt-3">Register as Reader</a>
                        </div>
                    </div>
                </div>

                <!-- For Librarians -->
                <div class="col-md-6">
                    <div class="card feature-card shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="card-title text-primary mb-4">For Librarians</h3>
                            <div class="card-text">
                                <p class="mb-3">Expand your library's reach and manage your collection efficiently:</p>
                                <ul class="list-unstyled">
                                    <li class="mb-3">🏢 Create and manage your digital bookstore</li>
                                    <li class="mb-3">📚 List and manage your book inventory</li>
                                    <li class="mb-3">📊 Track lending statistics and returns</li>
                                    <li class="mb-3">💰 Generate revenue through digital lending</li>
                                </ul>
                            </div>
                            <a href="{{ route('register') }}" class="btn btn-custom mt-3">Register as Librarian</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container text-center">
            <img src="{{ asset('admin_asset/images/logo/logo_elib.png') }}" alt="EasyLib Logo" height="30" class="mb-3">
            <p class="mb-0">© 2024 EasyLib. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('admin_asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/dynamic-pie-chart.js') }}"></script>
    <script src="{{ asset('admin_asset/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('admin_asset/js/jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin_asset/js/world-merc.js') }}"></script>
    <script src="{{ asset('admin_asset/js/polyfill.js') }}"></script>
    <script src="{{ asset('admin_asset/js/main.js') }}"></script>
</body>
</html>