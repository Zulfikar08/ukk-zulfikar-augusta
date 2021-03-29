<div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Nav items -->
    @if ( $menu->contains('admin') )
    <h6 class="navbar-heading p-0 text-muted">
        <span class="docs-normal">Admin</span>
    </h6>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link"
                href="{{ route('admin/dashboard') }}">
                <i class="ni ni-tv-2 text-default"></i>
                <span class="nav-link-text">Beranda</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin/time-line') }}">
                <i class="ni ni-planet text-primary"></i>
                <span class="nav-link-text">Timeline </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin/verifikasi') }}">
                <i class="ni ni-time-alarm text-yellow"></i>
                <span class="nav-link-text">Pending</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin/pengaduan') }}">
            <i class="ni ni-bullet-list-67 text-success"></i>
            <span class="nav-link-text">Data Pengaduan</span>
        </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin/data-user') }}">
                <i class="ni ni-single-02 text-info"></i>
                <span class="nav-link-text">Data User</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin/petugas') }}">
                <i class="ni ni-lock-circle-open text-warning"></i>
                <span class="nav-link-text">User Nonaktif</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" type="button" href="" data-toggle="modal" data-target="#modal-notification">
                <i class="ni ni-user-run text-dark"></i>
                <span class="nav-link-text">Logout</span>
            </a>
        </li>
    </ul>
    @endif

    @if ( $menu->contains('petugas') )
    <h6 class="navbar-heading p-0 text-muted">
        <span class="docs-normal">Petugas</span>
    </h6>
    <!-- Divider -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('petugas/dashboard') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Beranda</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas/time-line') }}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Timeline </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas/verifikasi') }}">
                <i class="ni ni-time-alarm text-info"></i>
                <span class="nav-link-text">Pending</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" type="button" href="" data-toggle="modal" data-target="#modal-notification">
                <i class="ni ni-user-run text-dark"></i>
                <span class="nav-link-text">Logout</span>
            </a>
        </li>
    </ul>
    @endif

    @if ( $menu->contains('masyarakat') )
    <h6 class="navbar-heading p-0 text-muted">
        <span class="docs-normal">Masyarkat</span>
    </h6>
    <!-- Divider -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('masyarakat/dashboard') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Beranda</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('masyarakat/time-line') }}">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Timeline </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('tulis-aduan') }}">
                <i class="ni ni-ruler-pencil text-info"></i>
                <span class="nav-link-text">Aduan </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" type="button" href="" data-toggle="modal" data-target="#modal-notification">
                <i class="ni ni-user-run text-dark"></i>
                <span class="nav-link-text">Logout</span>
            </a>
        </li>
    </ul>
    @endif
</div>



    <!-- <li class="nav-item">

        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li> -->
