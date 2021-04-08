@extends('layouts.pages.app')
@section('title', 'Envelope | Dashboard')

@section('content')
<div class="header bg-gradient-info pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                </div>
            </div>
            <!-- CARD STATUS -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Pengaduan</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $jumlah_aduan }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-active-40"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Pending</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $jumlah_pending }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-chart-pie-35"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Selesai</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $jumlah_selesai }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-check-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Diproses</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $jumlah_diproses }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CARD STATUS END -->
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0 text-info">Welcome</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">Selamat datang di Envelope! Envelope adalah aplikasi penyampaian pengaduan
                        masyarkat berbasis digital. Anda adalah Petugas, verifikasi ada ditangan anda!</p>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0 text-info">Peraturan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <p>Ada beberapa peraturan di envelope, diantaranya :</p>
                    <div class="card" style="width: 100%;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dilarang menulis aduan palsu</li>
                            <li class="list-group-item">Dilarangan menggunakan kalimat/kata kasar</li>
                            <li class="list-group-item">Dilarang membuat aduan yang bersifat sarkas kepada pihak atau
                                golongan manapun</li>
                        </ul>
                    </div>
                    <p>Bagi yang melanggar akan dikenakan sanksi, seperti akun dinonaktifkan atau diban secara permanent
                        dari Envelope</p>
                </div>
            </div>
        </div>
    </div>
    @endsection
