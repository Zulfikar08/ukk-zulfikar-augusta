@extends('layouts.pages.app')
@section('title', 'Envelope | Pengaduan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pengaduan</h1>
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
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Cetak pertanggal
                </h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="tgl-awal" class="col-4 col-form-label">Dari</label>
                    <div class="col-8">
                        <input class="form-control" name="tglAwal" type="date" value="2021-01-01" id="tglAwal">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl-akhir" class="col-4 col-form-label">Sampai</label>
                    <div class="col-8">
                        <input class="form-control" name="tglAkhir" type="date" value="2021-01-01" id="tglAkhir">
                    </div>
                </div>
                <div class="form-group">
                    <a href=""
                        onclick="this.href='/admin/cetak-aduan-pertanggal/'+ document.getElementById('tglAwal').value + '/' + document.getElementById('tglAkhir').value"
                        target="_blank" class="btn btn-primary btn-block">Export</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Cetak berdasarkan lokasi
                </h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="lokasi" class="col-4 col-form-label">Desa</label>
                    <div class="col-8">
                        <select class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi">
                            @foreach( $desa as $item )
                            <option value="{{ $item->nama_desa }}">{{ $item->nama_desa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <a href=""
                        onclick="this.href='/admin/cetak-aduan-lokasi/'+ document.getElementById('lokasi').value"
                        target="_blank" class="btn btn-primary btn-block">Export</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
</div>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Data Pengaduan
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $pengaduan as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->users->name }}</td>
                                <td>{{ $item->judul_laporan }}</td>
                                <td>{{ $item->lokasi }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a class="badge badge-info"
                                        href="{{ route('admin/detail-aduan', $item->id) }}">detail</a>
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
