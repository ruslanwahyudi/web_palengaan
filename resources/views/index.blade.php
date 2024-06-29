<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Official Website - Kecamatan Palengaan</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Construction Company Website Template" name="keywords">
        <meta content="Construction Company Website Template" name="description">

        <!-- Favicon -->
        <!-- <link href="img/favicon.ico" rel="icon"> -->
        <link rel="shortcut icon" href="{{ asset('uploads/') }}/{{ $settings[0]->icon_fav }}" />

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('frontend/lib/flaticon/font/flaticon.css')}}" rel="stylesheet"> 
        <link href="{{ asset('frontend/lib/animate/animate.min.css')}}" rel="stylesheet">
        <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="{{ asset('frontend/lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{ asset('frontend/lib/slick/slick-theme.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- Top Bar Start -->
            <div class="top-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12">
                            <div class="logo">
                                <a href="{{ route('landingpage') }}">
                                    <!-- <h1>Kec. Palengaan</h1> -->
                                    <img width="250" height="70" src="{{ asset('frontend/img/logo.png') }}" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 d-none d-lg-block">
                            <div class="row">
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-calendar"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Jam Layanan</h3>
                                            <p style="font-size: 10px;">Senin-Jumat, 7:00-15:00</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-call"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Hubungi Kami</h3>
                                            <p style="font-size: 10px;">{{ $settings[0]->phone_org }}/{{ $settings[0]->fax_org }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-send-mail"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3>Email Kami</h3>
                                            <p style="font-size: 10px;">{{ $settings[0]->app_email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            @include('frontend.includes.fo_menu')

            @yield('content')

            

            @include('frontend.includes.fo_footer')

            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('frontend/lib/slick/slick.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('frontend/js/main.js') }}"></script>
    </body>
</html>
