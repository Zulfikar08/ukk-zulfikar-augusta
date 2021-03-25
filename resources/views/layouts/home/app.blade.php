<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Create a stylish landing page for your business startup and get leads for the offered services with this HTML landing page template.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title> @yield('title') </title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext"
        rel="stylesheet">
    <link href="web/css/bootstrap.css" rel="stylesheet">
    <link href="web/css/fontawesome-all.css" rel="stylesheet">
    <link href="web/css/swiper.css" rel="stylesheet">
    <link href="web/css/magnific-popup.css" rel="stylesheet">
    <link href="web/css/styles.css" rel="stylesheet">

    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->


    <!-- Navigation -->
    @extends('layouts.home.navbar')
    <!-- end of navigation -->

    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1><span class="turquoise">Welcome to Envelope</span></h1>
                            <p class="p-large">
                                Envelope adalah aplikasi penampung aduan masyarakat untuk apa saja yang terjadi
                                di wilayah Kecamatan Cibogo, Kabupaten Subang.
                                Dikelola oleh masyarakat dan disuarakan oleh masyarakat!
                            </p>
                            @guest
                                <a class="btn-solid-lg page-scroll" href="{{ route('register') }}">Daftar Sekarang!</a>
                                @else
                            @endguest
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="web/images/header-teamwork.svg" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->

    @yield('content')


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright @ <?= date('Y') ?> <a href="https://github.com/Zulfikar08/ukk-zulfikar-augusta">Envelope</a> - All rights
                        reserved</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="web/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="web/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="web/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="web/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="web/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="web/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="web/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="web/js/scripts.js"></script> <!-- Custom scripts -->
</body>

</html>
