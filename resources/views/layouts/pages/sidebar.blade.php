<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Envelope</div>
    </a>



    @if ( $menu->contains('admin') )
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin/time-line') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Timeline</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin/verifikasi') }}">
            <i class="fas fa-fw fa-key"></i>
            <span>Pending Verifikasi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin/petugas') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Petugas Management</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{ route('admin/data-user') }}">Data User</a>
                <a class="collapse-item" href="{{ route('admin/pengaduan') }}">Data Pengaduan</a>
            </div>
        </div>
    </li>
    @endif

    @if ( $menu->contains('petugas') )
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('petugas/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Petugas
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('petugas/time-line') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Timeline</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('petugas/verifikasi') }}">
            <i class="fas fa-fw fa-comments"></i>
            <span>Pending Verifikasi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('petugas/data-user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>User manajement</span></a>
    </li>
    @endif

    @if ( $menu->contains('masyarakat') )
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('masyarakat/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <div class="sidebar-heading">
        Masyarakat
    </div>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('masyarakat/time-line') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Timeline</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tulis-aduan') }}">
            <i class="fas fa-fw fa-edit"></i>
            <span>Aduan</span></a>
    </li>
    @endif
    <li class="nav-item">

        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    <!-- Divider -->

</ul>
