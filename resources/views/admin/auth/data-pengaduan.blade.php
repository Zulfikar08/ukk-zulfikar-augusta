@extends('layouts.pages.app')
@section('title', 'Envelope | Pengaduan')

@section('content')
<div class="header bg-gradient-info pb-6">
    <div class="container-fluid">
        <div class="header-body">

            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pengaduan</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <button data-toggle="modal" data-target="#cetakPertanggal" type="button"
                        class="btn btn-sm btn-neutral">Cetak Pertanggal</button>
                    <button data-toggle="modal" data-target="#cetakPerlokasi" type="button"
                        class="btn btn-sm btn-neutral">Cetak Perlokasi</button>
                    <button data-toggle="modal" data-target="#cetakPerstatus" type="button"
                        class="btn btn-sm btn-neutral">Cetak Perstatus</button>
                </div>
            </div>
            <!-- Modal Report Pertanggal -->
            <div class="modal fade" id="cetakPertanggal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <label for="tgl-awal" class="col-4 col-form-label">Dari</label>
                                <div class="col-8">
                                    <input class="form-control" name="tglAwal" type="date" value="2021-01-01"
                                        id="tglAwal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl-akhir" class="col-4 col-form-label">Sampai</label>
                                <div class="col-8">
                                    <input class="form-control" name="tglAkhir" type="date" value="2021-01-01"
                                        id="tglAkhir">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <a onclick="this.href='/admin/cetak-aduan-pertanggal/'+ document.getElementById('tglAwal').value + '/' + document.getElementById('tglAkhir').value"
                                target="_blank" class="btn btn-primary text-white">Cetak</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Report Perlokasi -->
            <div class="modal fade" id="cetakPerlokasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <label for="lokasi" class="col-4 col-form-label">Desa</label>
                                <div class="col-8">
                                    <select class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                                        name="lokasi">
                                        @foreach( $desa as $item )
                                        <option value="{{ $item->nama_desa }}">{{ $item->nama_desa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a onclick="this.href='/admin/cetak-aduan-lokasi/'+ document.getElementById('lokasi').value"
                                target="_blank" class="btn btn-primary text-white">Cetak</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="cetakPerstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <label for="status" class="col-4 col-form-label">Status</label>
                                <div class="col-8">
                                    <select class="form-control @error('status') is-invalid @enderror" id="status"
                                        name="status">
                                        <option value="proses">proses</option>
                                        <option value="pending">pending</option>
                                        <option value="selesai">selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <a onclick="this.href='/admin/cetak-aduan-status/'+ document.getElementById('status').value"
                                target="_blank" class="btn btn-primary text-white">Cetak</a>
                        </div>
                    </div>
                </div>
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
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0 text-info">Data Pengaduan</h5>
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
