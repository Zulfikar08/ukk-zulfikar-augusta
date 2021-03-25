@extends('layouts.pages.app')
@section('title', 'Envelope | Tanggapan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tanggapan</h1>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-lg-8 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $pengaduan->users->name }} -
                    {{ $pengaduan->judul_laporan }}
                </h6>
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
                <li class="list-group-item active">{{ $item->name }}</li>
                <li class="list-group-item">{{ $item->isi_tanggapan }}</li>
            </ul>
            @endforeach
        @else
        <p class="text-center">Tidak Ada tanggapan</p>
        @endif
    </div>


</div>
@endsection
