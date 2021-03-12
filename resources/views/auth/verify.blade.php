
@extends('layouts.auth.app')

@section('title', 'Envelope | Verification')

@section('content')
<!-- Nested Row within Card Body -->
<div class="row">
    <div class="col-lg">
        <div class="pt-5 px-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900">Verifikasi Email</h1>
                <p class="text-gray-900">Silahkan cek email anda lalu klik verifikasi email</p>
                <p class="text-gray-900">{{ Auth::user()->email }}</p>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Kirim Ulang Email') }}</button>.
                </form>
            </div>
        </div>
    </div>
</div>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="p-small">Copyright @ <?= date('Y') ?> <a
                        href="https://github.com/Zulfikar08/ukk-zulfikar-augusta">Envelope</a> - All rights
                    reserved</p>
            </div> 
        </div>
    </div>
</div>

@endsection()