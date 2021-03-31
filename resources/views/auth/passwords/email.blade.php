@extends('layouts.auth.app')

@section('title', 'Envelope | Reset')

@section('content')
<div class="row">
    <div class="col-lg-12">
    @if (session('status'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('status') }}
    </div>
    @endif
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-2">Lupa Password Anda?</h1>
                <p class="mb-4">Kami mengerti, banyak hal terjadi. Cukup masukkan alamat email Anda di bawah ini
                    dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda!</p>
            </div>
            <form class="user" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
                        name="email" aria-describedby="emailHelp" placeholder="Masukan alamat email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Reset Password
                </button>
            </form>
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('register') }}">Daftar Envelope!</a>
            </div>
            <div class="text-center">
                <a class="small" href="{{ route('login') }}">Login!</a>
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
@endsection
