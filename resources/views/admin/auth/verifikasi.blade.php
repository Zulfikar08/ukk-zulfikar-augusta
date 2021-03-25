@extends('layouts.pages.app')
@section('title', 'Envelope')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pending verifikasi</h1>
</div>
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-lg-6 mb-2">
        <form class="form-inline" method="" action="">
            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <div class="col-lg-6 mb-2">
        <div class="dropdown float-right">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Urutkan berdasarkan
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="">Terbaru</a>
                <a class="dropdown-item" href="#">Judul</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg mb-4">
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Judul Pengaduan</th>
                                <th>Isi Pengaduan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $pengaduan as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->users->name }}</td>
                                <td>{{ $item->judul_laporan }}</td>
                                <td>{{ Str::limit($item->isi_laporan, 50, '....') }}</td>
                                <td>
                                    <a href="{{ route('admin/detail-verifikasi', $item->id) }}"
                                        class="badge badge-primary">detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pengaduan->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
