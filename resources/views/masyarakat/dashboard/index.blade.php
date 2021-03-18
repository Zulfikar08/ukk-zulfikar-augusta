@extends('layouts.pages.app')
@section('title', 'Envelope | Dashboard')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
@if(!Auth::user()->email_verified_at)
    <div class="alert alert-danger" role="alert">
        Email anda belum terverifikasi! Cek email anda, atau
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('verifikasi ulang') }}</button>.
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

<!-- Content Row -->
<div class="row">

    <div class="col-lg-6 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Welcome to ENVELOPE</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="{{ url('sb_admin/img/undraw_posting_photo.svg') }}" alt="">
                </div>
                <p>Selamat datang di Envelope! Envelope adalah aplikasi penyampaian pengaduan masyarkat
                berbasis digital</p>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Peraturan</h6>
            </div>
            <div class="card-body">
                <p> <strong>Ada beberapa peraturan di envelope, diantaranya :</strong> </p>
                <ul class="list-group">
                    <li class="list-group-item">Dilarang menulis aduan palsu</li>
                    <li class="list-group-item">Dilarangan menggunakan kalimat/kata kasar</li>
                    <li class="list-group-item">Dilarang membuat aduan yang bersifat sarkas kepada pihak atau golongan manapun</li>
                </ul>
                <p class="m-2">Bagi yang melanggar akan dikenakan sanksi, seperti akun <strong class="text-danger">dinonaktifkan atau diban</strong>  secara permanent
                dari Envelope</p>
            </div>
        </div>
    </div>
        <!-- Approach -->

</div>
@endsection
