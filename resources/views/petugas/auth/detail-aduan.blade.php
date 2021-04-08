@extends('layouts.pages.app')
@section('title', 'Envelope | Aduan')

@section('content')
<div class="header bg-gradient-info pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tanggapan</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h4 mb-0 text-info">
                                {{ $pengaduan->users->name }} -
                                {{ $pengaduan->judul_laporan }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" src="{{ url('/'. $pengaduan->file) }}" alt="">
                        </div>
                        <p class="text-gray">
                            <small>{{ $pengaduan->tgl_pengaduan }}</small>
                        </p>
                        @if($pengaduan->status == 'pending')
                        <p class="badge badge-pill badge-warning mx-3">{{ $pengaduan->status }}</p>
                        @elseif($pengaduan->status == 'proses')
                        <p class="badge badge-pill badge-primary mx-3">{{ $pengaduan->status }}</p>
                        @else
                        <p class="badge badge-pill badge-success mx-3">{{ $pengaduan->status }}</p>
                        @endif
                        <p>{{ $pengaduan->isi_laporan }}</p>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-xl-4 mb-4">
            @if(count($tanggapan) > 0)
                @foreach( $tanggapan as $item )
                <ul class="list-group mb-3">
                    <li class="list-group-item text-info">{{ $item->name }}</li>
                    <li class="list-group-item">{{ $item->isi_tanggapan }}</li>
                </ul>
                @endforeach
            @else
            <p class="text-center text-white">Tidak Ada tanggapan</p>
            @endif
            <form method="POST" action="{{ route('petugas/tanggapan/kirim') }}">
                @csrf
                <div class="form-group mb-3">
                    <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">
                    <input type="text" class="form-control @error('isi_tanggapan') is-invalid @enderror" id="tanggapan"
                        name="isi_tanggapan" aria-describedby="emailHelp" placeholder="Tulis tanggapan" autofocus>
                    @error('isi_tanggapan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="{{ $pengaduan->status }}"><i>{{ $pengaduan->status }}</i></option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <button type="submit" class="btn btn-info float-right">kirim</button>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection
