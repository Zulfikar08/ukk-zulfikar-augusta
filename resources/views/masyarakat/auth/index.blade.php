@extends('layouts.pages.app')
@section('title', 'Envelope | Dashboard')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tulis Pengaduan</h1>
</div>

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
                            name="judul_laporan" aria-describedby="emailHelp" value="{{ old('judul_laporan') }}">
                        @error('judul_laporan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" aria-describedby="emailHelp"
                            value="{{ Auth::user()->nik }}" readonly>
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
                <div class="text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">judul</th>
                                <th scope="col">aksi</th>
                            </tr>
                        </thead>
                        @foreach( $pengaduan as $item )
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->judul_laporan }}</td>
                                    <td>
                                        <a href="" class="badge badge-primary">
                                            edit
                                        </a>
                                        <a href="" class="badge badge-primary">
                                            delete
                                        </a>
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
