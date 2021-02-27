@extends('layouts.auth.app')

@section('title', 'Envelope | Login')

@section('content')
<!-- Nested Row within Card Body -->
<div class="row">
    <div class="col-lg">
        <div class="pt-5 px-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Halaman Masuk</h1>
            </div>
            <form class="user" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                        id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp"
                        placeholder="Email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" class="form-control form-control-user @error('email') is-invalid @enderror"
                        id="password" name="password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                            class="custom-control-input">
                        <label class="custom-control-label" for="customCheck">Remember
                            Me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
            </form>
            <hr>
            @if (Route::has('password.request'))
            <div class="text-center">
                <a class="small" href="{{ route('password.request') }}">Lupa Password?</a>
            </div>
            @endif
            <div class="text-center">
                <a class="small" href="{{ route('register') }}">Bergabung di Envelope!</a>
            </div>
            <div class="text-center">
                <a class="small" href="/">Home!</a>
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
