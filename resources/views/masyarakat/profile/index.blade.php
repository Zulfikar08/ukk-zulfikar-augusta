@extends('layouts.pages.app')
@section('title', 'Envelope | Profile')

@section('content')
<div class="header py-6 mb-3 d-flex bg-gradient-info">
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-12 col-md-10">
                <h1 class="display-2 text-white">Halo {{ $user->name }}</h1>
                <p class="text-white mt-0 mb-5">Ini adalah halaman profilemu, disini kamu bisa edit profilemu sesuka
                    hati
                </p>
            </div>
        </div>
    </div>
</div>

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src=" {{ url('icon/foto-sampul.png') }} " alt="Image placeholder" class="card-img-top">
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div>
                                    <span class="heading">{{ $user->name }}</span>
                                    <span class="description">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i>{{ $user->email }}
                        </div>
                        <div class="text-info">
                            <i class="ni education_hat mr-2"></i>{{ $user->phone }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit profile </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('masyarakat/profile/kirim') }}">
                        @method('patch')
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Nama</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nama Lengkap" value="{{ $user->name }}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="email@contoh.com" value="{{ $user->email }}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nik">NIK</label>
                                        <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" readonly
                                            value="{{ $user->nik }}">
                                        @error('nik')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="phone">No.Telp</label>
                                        <input type="number" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder=""
                                            value="{{ $user->phone }}">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <button type="submit" class="btn btn-info float-right">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
