@extends('layouts.auth.app')

@section('title', 'Envelope | Register')

@section('content')
<!-- Nested Row within Card Body -->
<div class="row">
    <div class="col-lg">
        <div class="pt-5 px-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Account!</h1>
            </div>
            <form class="user" id="reg-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                        id="name" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user @error('phone') is-invalid @enderror"
                            id="phone" name="phone" placeholder="No Telepon" value="{{ old('phone') }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user @error('nik') is-invalid @enderror"
                            id="nik" name="nik" placeholder="NIK" value="{{ old('nik') }}">
                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                        id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password"
                            class="form-control form-control-user @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="password-confirm"
                            name="password_confirmation" placeholder="Ulangi Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Daftar
                </button>
            </form>
            <hr>
            <div class="text-center">
            </div>
            <div class="text-center">
                <a class="small" href="{{ route('login') }}">Sudah punya akun? Masuk!</a>
            </div>
            <div class="text-center">
                <a class="small" href="/">home</a>
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
