<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>@yield('title')</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ url('argon/assets/img/brand/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ url('argon/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ url('argon/assets/css/argon.css?v=1.2.0') }}" type="text/css">
  <!-- Datatable -->
  <link rel="stylesheet" type="text/css" href="{{ url('datatable/css/dataTables.bootstrap4.min.css') }}">

</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ url('argon/assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">

        @include('layouts.pages.sidebar')

      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-info border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->

          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>

          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="{{ url('argon/assets/img/theme/team-4.jpg') }}">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                @if ( $menu->contains('admin') )
                <a href="{{ route('admin/profile') }}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Profile</span>
                </a>
                @endif
                @if ( $menu->contains('petugas') )
                <a href="{{ route('petugas/profile') }}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Profile</span>
                </a>
                @endif
                @if ( $menu->contains('masyarakat') )
                <a href="{{ route('masyarakat/profile') }}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>Profile</span>
                </a>
                @endif
                <div class="dropdown-divider"></div>
                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-notification">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </button>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
      @yield('content')  

      <!-- Footer -->
      <footer class="footer pt-0" style="bottom: 0; text-align: center;">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg">
            <div class="copyright text-center text-lg-left text-muted">
             Copyright &copy; 2021<a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Envelope</a>
            </div>
          </div>
        </div>
      </footer>
      
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ url('argon/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ url('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('argon/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ url('argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ url('argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ url('argon/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ url('argon/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ url('argon/assets/js/argon.js?v=1.2.0') }}"></script>
  <script type="text/javascript" language="javascript" src="{{ url('datatable/js/jquery-3.3.1.js') }} "></script>
	<script type="text/javascript" language="javascript" src="{{ url('datatable/js/jquery.dataTables.min.js') }} "></script>
	<script type="text/javascript" language="javascript" src="{{ url('datatable/js/dataTables.bootstrap4.min.js') }} "></script>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#dataTable').DataTable();
    } );
  </script>
</body>

</html>


    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">

    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">
        	
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Konfirmasi</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
            	
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Logout</h4>
                    <p>Yakin ingin keluar dari Envelope.</p>
                </div>
                
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Batal</button>
                <a type="button" class="btn btn-white" href="{{ route('logout') }}"  
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Yakin!</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            
        </div>
    </div>


</body>

</html>