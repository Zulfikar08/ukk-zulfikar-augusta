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

            @if(!Auth::user()->email_verified_at)
            <div class="alert alert-danger" role="alert">
                Email anda belum terverifikasi! Cek email anda, atau
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit"
                        class="btn btn-link p-0 m-0 align-baseline">{{ __('verifikasi ulang') }}</button>.
                </form>
            </div>
            @endif
            
            @if(!Auth::user()->nik)
            <div class="alert alert-danger" role="alert">
                Biodata anda belum lengkap! silahkan lengkapi di
                <a href="{{ route('masyarakat/profile') }}" class="btn btn-link p-0 m-0 align-baseline">{{ __('sini') }}</a>.
            </div>
            @endif

            @if (session('resent'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Email dikirim ulang!</strong> Silahkan cek email anda
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
</div>

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
                        masyarkat berbasis digital.</p>
                    <a href="{{ route('tulis-aduan') }}" class="btn btn-info">Tulis Laporan</a>
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
