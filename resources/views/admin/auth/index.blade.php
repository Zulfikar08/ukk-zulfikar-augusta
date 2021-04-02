@extends('layouts.pages.app')
@section('title', 'Envelope | User')

@section('content')
<div class="header bg-gradient-info pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Data User</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#cetakPerLevel">
                        Buat Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cetakPerLevel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="lokasi" class="col-4 col-form-label">Role</label>
                    <div class="col-8">
                        <select class="form-control" id="role" name="role">
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                            <option value="Masyarakat">Masyarakat</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a onclick="this.href='/admin/user/export/'+ document.getElementById('role').value"
                    target="_blank" class="btn btn-primary text-white">Cetak</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12 col-mb-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0 text-info">Tambah Petugas</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form method="post" action="{{ route('admin/petugas/tambah') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama Lengkap" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" placeholder="No Telp"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                                    placeholder="Nik" value="{{ old('nik') }}">
                                @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="password_confirmation" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>
                        <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                            <option value="" class="text-gray"> - Level - </option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="btn btn-info mt-3 float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0 text-info">Data User</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-sm" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No.Telp</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $users as $item )
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->getRoleNames()->first() }}</td>
                                    <td>
                                        <a class="badge badge-info"
                                            href="{{ route('admin/detail-user', $item->id) }}">detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
