<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <!-- Text Logo - Use this if you don't have a graphic logo -->
    <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

    <!-- Navbar Branf -->
    <a class="navbar-brand logo-text page-scroll text-info" href="index.html">Envelope</a>

    <!-- Mobile Menu Toggle Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-awesome fas fa-bars"></span>
        <span class="navbar-toggler-awesome fas fa-times"></span>
    </button>
    <!-- end of mobile menu toggle button -->

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#header">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#services">Layanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#pricing">Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="#about">Tentang kami</a>
            </li>
            @guest
            <li class="nav-item">
                <a class="nav-link page-scroll" href="{{ route('login') }}">Masuk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="{{ route('register') }}">Daftar</a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link page-scroll" onclick="document.getElementById('logout-form').submit();"
                    href="#logout-form">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
            @endguest
        </ul>
    </div>
</nav> <!-- end of navbar -->
<!-- end of navigation -->
