@extends('layouts.pages.app')
@section('title', 'Envelope | Pengaduan')

@section('content')
<div class="header bg-gradient-info pb-6">
    <div class="container-fluid">
        <div class="header-body">

            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Data User</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 mb-3 col-md-6">
                    <form method="get" action="{{ route('admin/search') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari" id="search" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-info" type="submit" id="button-addon2">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-6 col-md-6 text-right">
                    <a href="{{ route('admin/user-export') }}" class="btn btn-sm btn-neutral">
                        Buat Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0 text-info">Data Masyarakat</h5>
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
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $users as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ implode(', ', $item->roles()->get()->pluck('name')->toArray()) }}</td>
                                    <td>
                                        <a class="badge badge-info"
                                            href="{{ route('admin/detail-user', $item->id) }}">detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0 text-warning">Data User Nonaktif</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $nonaktif as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ implode(', ', $item->roles()->get()->pluck('name')->toArray()) }}</td>
                                    <td>
                                        <a class="badge badge-success"
                                            href="{{ route('admin/aktifkan-user', $item->id) }}">aktifkan</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $nonaktif->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection
