@extends('layouts.pages.app')
@section('title', 'Envelope | Aduan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tulis Pengaduan</h1>
</div>

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- Content Row -->
<div class="row">


    <div class="col-lg-6 mb-4">

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tulis Laporan</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('tulis-aduan/kirim') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Laporan</label>
                        <input type="text" class="form-control @error('judul_laporan') is-invalid @enderror" id="judul"
                            name="judul_laporan" value="{{ old('judul_laporan') }}">
                        @error('judul_laporan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                            value="{{ Auth::user()->nik }}" readonly>
                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">Desa</label>
                        <select class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi">
                            <option value=""> -- </option>
                            @foreach( $desa as $item )
                            <option value="{{ $item->nama_desa }}">{{ $item->nama_desa }}</option>
                            @endforeach
                        </select>
                        @error('lokasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi_laporan">Isi Laporan</label>
                        <textarea type="text" class="form-control @error('isi_laporan') is-invalid @enderror"
                            name="isi_laporan"></textarea>
                        @error('isi_laporan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="file">Bukti laporan</label>
                        <input type="file" class="form-control-file @error('file') is-invalid @enderror" name="file">
                        <small id="help" class="form-text text-muted">(wajib disertakan bukti foto)</small>
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Kirim</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Aduan Saya</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">judul</th>
                                <th scope="col">status</th>
                                <th scope="col">aksi</th>
                            </tr>
                        </thead>
                        @foreach( $pengaduan as $item )
                        <tbody>
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->judul_laporan }}</td>
                                <td>
                                    @if($item->status == 'pending')
                                    <span class="badge badge-warning">{{ $item->status }}</span>
                                    @elseif($item->status == 'proses')
                                    <span class="badge badge-primary">{{ $item->status }}</span>
                                    @else
                                    <span class="badge badge-success">{{ $item->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status != 'selesai')
                                    <a href="{{ route('aduan/edit', $item->id) }}" class="badge badge-primary badge-pill">
                                        edit
                                    </a>
                                    @endif
                                    <form action="{{ route('aduan/hapus',$item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                        <button type="submit" class="badge badge-danger badge-pill">
                                            delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
