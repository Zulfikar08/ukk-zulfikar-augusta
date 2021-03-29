@extends('layouts.pages.app')
@section('title', 'Envelope')

@section('content')
<div class="header bg-gradient-info pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Verikasi</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0 text-info">{{ $pengaduan->judul_laporan }} - {{ $pengaduan->users->name }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" src="{{ url('/'. $pengaduan->file) }}" alt="">
                    </div>
                    <p class="text-center">{{ $pengaduan->isi_laporan }}</p>
                    <form action=" {{ route('petugas/verifikasi/tolak', $pengaduan->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger float-right"
                            onclick="return confirm('Yakin?');">Tolak</button>
                        <a href="{{ route('petugas/verifikasi/terima', $pengaduan->id) }}"
                            class="btn btn-info">Terima</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
