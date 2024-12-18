<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('furni-1.0.0/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('furni-1.0.0/css/tiny-slider.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main copy.css') }}">
    <link rel="stylesheet" href="{{ asset('css/util copy.css') }}">
    <link href="{{ asset('furni-1.0.0/css/style.css') }}" rel="stylesheet">
    <title>{{ $title ?? 'UMKM INDONESIA' }}</title>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="#">Nusantara Craft<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item {{ Request::is('pemesanan') ? 'active' : '' }}">
                        <a class="nav-link" href="/pemesanan">Home</a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('shopCustomer') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('shopCustomer') }}">Shop</a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('AboutUsCustomer') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('AboutUsCustomer') }}">About us</a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('ContactCustomer') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('ContactCustomer') }}">Contact us</a>
                    </li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="{{ route('showLoginAdmin') }}"><img
                                src="{{ asset('furni-1.0.0/images/user.svg') }}"></a>
                    </li>
                    <li><a class="nav-link" href="{{ route('cartCustomer') }}"><img
                                src="{{ asset('furni-1.0.0/images/cart.svg') }}"></a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1> @yield('hero-title', 'default Title')<span clsas="d-block"></span></h1>
                        <p class="mb-4">Dukung pengrajin Indonesia, temukan karya terbaik dari <br>UMKM Indonesia
                            Pelosok.
                        </p>
                        <p><a href="{{ route('shopCustomer') }}" class="btn btn-secondary me-2">Shop Now</a><a
                                href="{{ route('shopCustomer') }}" class="btn btn-white-outline">Explore</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        {{-- <img src="{{ asset('furni-1.0.0/images/couch.png') }} " class="img-fluid"> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->
    @yield('content')

    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">

            <div class="sofa-img">
                <img src="{{ asset('furni-1.0.0/images/sofa.png') }}" alt="Image" class="img-fluid">
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center"><span class="me-1"><img
                                    src="images/envelope-outline.svg" alt="Image"
                                    class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

                        <form action="#" class="row g-3">
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="col-auto">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Nusantara
                            Craft<span>.</span></a>
                    </div>
                    <p class="mb-4"> Kami mendukung perkembangan UMKM di Indonesia dengan menyediakan produk
                        berkualitas dan layanan terbaik untuk masyarakat. Jadilah bagian dari perjalanan kami menuju
                        kemajuan ekonomi lokal.
                    </p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Shop</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Contact us</a></li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>



        </div>
        </div>

        </div>
    </footer>
    <!-- End Footer Section -->


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/main.js"></script>
    <script src="js/map-custom.js"></script>
    <script src="js/slick-custom.js"></script>

</body>

</html>
