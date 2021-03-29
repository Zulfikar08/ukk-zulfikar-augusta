@extends('layouts.pages.app')
@section('title', 'Envelope | Tanggapan')

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

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
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
                            <small>{{ $pengaduan->tgl_pengaduan }} - {{ $pengaduan->lokasi }}</small>
                        </p>
                        @if($pengaduan->status == 'pending')
                        <p class="badge badge-warning mx-3">{{ $pengaduan->status }}</p>
                        @elseif($pengaduan->status == 'proses')
                        <p class="badge badge-primary mx-3">{{ $pengaduan->status }}</p>
                        @else
                        <p class="badge badge-success mx-3">{{ $pengaduan->status }}</p>
                        @endif
                        <p>{{ $pengaduan->isi_laporan }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            @if(count($tanggapan) > 0)
            @foreach( $tanggapan as $item )
            <ul class="list-group mb-2">
                <li class="list-group-item">{{ $item->name }}</li>
                <li class="list-group-item">{{ $item->isi_tanggapan }}</li>
            </ul>
            @endforeach
            @else
            <p class="text-center">Tidak Ada tanggapan</p>
            @endif
        </div>


    </div>
    @endsection
