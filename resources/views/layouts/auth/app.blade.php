<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Evelo Template -->
    <link href="{{ url('web/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('web/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ url('web/css/swiper.css') }}" rel="stylesheet">
    <link href="{{ url('web/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ url('web/css/styles.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="{{ url('sb_admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('sb_admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-info">
    
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        @yield('content')
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('sb_admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('sb_admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('sb_admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('sb_admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Evelo JS -->
    <script src="{{ url('web/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ url('web/js/popper.min.js') }}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="{{ url('web/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ url('web/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ url('web/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ url('web/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ url('web/js/validator.min.js') }}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{ url('web/js/scripts.js') }}"></script> <!-- Custom scripts -->

</body>

</html>
