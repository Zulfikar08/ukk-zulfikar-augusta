
@extends('layouts.auth.app')

@section('title', 'Envelope | Blocked')

@section('content')
<!-- Nested Row within Card Body -->
<div class="row">
    <div class="col-lg">
        <div class="pt-5 px-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900">User Banned</h1>
                <p class="text-gray-900">User anda telah dibanned oleh admin</p>
                <p class="text-gray-900">Mungkin karena berkata kasar, menyampaikan aduan palsu, atau menyidiri pihak</p>
                <p class="text-gray-900">{{ Auth::user()->email }}</p>
                    <a href="{{ route('login') }}"class="btn btn-link p-0 m-0 align-baseline">{{ __('Kembali ke halaman login') }}</a>.
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