@extends('layouts.pages.app')
@section('title', 'Envelope | Timeline')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Time-line</h1>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-8 mb-4">
    @foreach( $pengaduan as $item )
        @if($item->status != 'reject')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if($item->status == 'proses')
                <h6 class="m-0 font-weight-bold text-primary">{{ $item->users->name }} - {{ $item->judul_laporan }}</h6>
                @elseif($item->status == 'pending')
                <h6 class="m-0 font-weight-bold text-warning">{{ $item->users->name }} - {{ $item->judul_laporan }}</h6>
                @else
                <h6 class="m-0 font-weight-bold text-success">{{ $item->users->name }} - {{ $item->judul_laporan }}</h6>
                @endif
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 70%; height:70%;"
                        src="{{ url('/'. $item->file) }}" alt="">
                </div>
                <p class="text-gray">
                    <small>{{ $item->tgl_pengaduan }}</small>
                </p>
                <p>{{ $item->isi_laporan }}</p>
                <a href="{{ route('admin/tanggapan', $item->id) }}"> Tanggapi &rarr;</a>
            </div>
        </div>
        @endif
    @endforeach
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sortir</h6>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</div>
@endsection
