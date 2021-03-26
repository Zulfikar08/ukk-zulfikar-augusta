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
            @if($item->users['name'])
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    @if($item->status == 'proses')
                    <h6 class="m-0 font-weight-bold text-primary">{{ optional($item->users)->name }} - {{ $item->judul_laporan }}</h6>
                    @elseif($item->status == 'pending')
                    <h6 class="m-0 font-weight-bold text-warning">{{ optional($item->users)->name }} - {{ $item->judul_laporan }}</h6>
                    @else
                    <h6 class="m-0 font-weight-bold text-success">{{ optional($item->users)->name }} - {{ $item->judul_laporan }}</h6>
                    @endif
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 70%; height:70%;"
                            src="{{ url('/'. $item->file) }}" alt="">
                    </div>
                    <p>{{ $item->isi_laporan }}</p>
                    <a href="{{ route('admin/tanggapan', $item->id) }}"> Tanggapi &rarr;</a>
                </div>
                <div class="card-footer text-center">
                    <small> Dibuat pada : {{ $item->tgl_pengaduan }}</small>
                </div>
            </div>
            @endif
        @endif
    @endforeach
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Information</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="text-center">
                        <div class="badge badge-pill badge-warning">Pending</div>
                        <div class="badge badge-pill badge-primary">Proses</div>
                        <div class="badge badge-pill badge-success">Selesai</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
