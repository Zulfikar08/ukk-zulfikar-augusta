@extends('layouts.pages.app')
@section('title', 'Envelope | Profile')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif


<!-- Content Row -->
<div class="row">

    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit profile</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin/profile/update') }}">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="judul">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" aria-describedby="emailHelp" value="{{ $user->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $user->email }}" readonly>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" aria-describedby="emailHelp"
                            value="{{ $user->nik }}">
                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">No.Telp</label>
                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Your profile</h6>
            </div>
            <div class="card-body text-center">
                <h3> <strong>{{ $user->name }}</strong> </h3>
                <h5> <small>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</small> </h5>

                <hr>
                <a href="">{{ $user->email }}</a>
                <hr>
                {{ $user->nik }}
                <hr>
                <a href="">{{ $user->phone }}</a>
            </div>
            <div class="card-footer text-center">
                <small> since : {{ $user->created_at }}</small>
            </div>
        </div>
    </div>

</div>
@endsection
