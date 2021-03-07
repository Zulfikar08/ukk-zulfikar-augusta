@extends('layouts.pages.app')
@section('title', 'Envelope | Timeline')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Time-line</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-7 mb-4">
    @foreach( $pengaduan as $item )
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $item->users->name }} - {{ $item->judul_laporan }}</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 60%; height:60%;"
                        src="{{ url('/'. $item->file) }}" alt="">
                </div>
                <p class="text-gray">
                    <small>{{ $item->tgl_pengaduan }}</small>
                </p>
                <p>{{ $item->isi_laporan }}</p>
                <a target="_blank" rel="nofollow" href=""> Tanggapan &rarr;</a>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
