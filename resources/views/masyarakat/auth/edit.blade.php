@extends('layouts.pages.app')
@section('title', 'Envelope | Aduan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pengaduan</h1>
</div>

<!-- Content Row -->
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <div class="col-lg-6 mb-4">

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Laporan</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('aduan/edit/kirim', $pengaduan->id) }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <input type="hidden" name="status" id="status" value="{{ $pengaduan->status }}">
                    <div class="form-group">
                        <label for="judul">Judul Laporan</label>
                        <input type="text" class="form-control @error('judul_laporan') is-invalid @enderror" id="judul"
                            name="judul_laporan" aria-describedby="emailHelp" value="{{ $pengaduan->judul_laporan }}">
                        @error('judul_laporan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" aria-describedby="emailHelp"
                            value="{{ Auth::user()->nik }}" readonly>
                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="isi_laporan">Isi Laporan</label>
                        <textarea type="text" class="form-control @error('isi_laporan') is-invalid @enderror"
                            name="isi_laporan">{{ $pengaduan->isi_laporan }}</textarea>
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
                    <button type="submit" class="btn btn-primary float-right">Ubah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
