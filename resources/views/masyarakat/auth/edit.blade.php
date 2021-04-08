@extends('layouts.pages.app')
@section('title', 'Envelope | Aduan')

@section('content')
<div class="header bg-gradient-info pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pengaduan</h6>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt--6">
<div class="row">
    <div class="col-lg-6 mb-3">
        <div class="card shadow mb-4">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0 text-info">Edit Laporan</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alesrt">
                    <strong>Berhasil!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form method="post" action="{{ route('aduan/edit/kirim', $pengaduan->id) }}"
                    enctype="multipart/form-data">
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
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                            aria-describedby="emailHelp" value="{{ Auth::user()->nik }}" readonly>
                        @error('nik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">Desa</label>
                        <select class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi">
                            <option value="{{ $pengaduan->lokasi }}">{{ $pengaduan->lokasi }}</option>
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
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header bg-transparent">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="h3 mb-0 text-info">{{ $pengaduan->users->name }} -
                            {{ $pengaduan->judul_laporan }}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 90%; height:90%;"
                        src="{{ url('/'. $pengaduan->file) }}" alt="">
                </div>
                <p class="text-gray">
                    <small>Berlokasi di Desa :{{ $pengaduan->lokasi }}</small>
                </p>
                <p>{{ $pengaduan->isi_laporan }}</p>
                <a href="{{ route('masyarakat/tanggapan', $pengaduan->id) }}"> Tanggapan &rarr;</a>
            </div>
            <div class="card-footer text-center">
                <small> Dibuat pada : {{ $pengaduan->tgl_pengaduan }}</small>
            </div>
        </div>
    </div>
</div>
@endsection
