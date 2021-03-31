@extends('layouts.pages.app')
@section('title', 'Envelope | Timeline')

@section('content')
<div class="header bg-gradient-info pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Timeline</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-8">
            @foreach( $pengaduan as $item )
                @if($item->status != 'reject')
                    @if($item->users['name'])
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <div class="row align-items-center">
                                <div class="col">
                                    @if($item->status == 'proses')
                                    <h5 class="h4 mb-0 text-primary">{{ optional($item->users)->name }} -
                                        {{ $item->judul_laporan }}</h5>
                                    @elseif($item->status == 'pending')
                                    <h5 class="h4 mb-0 text-warning">{{ optional($item->users)->name }} -
                                        {{ $item->judul_laporan }}</h5>
                                    @else
                                    <h5 class="h4 mb-0 text-success">{{ optional($item->users)->name }} -
                                        {{ $item->judul_laporan }}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 70%; height:70%;"
                                    src="{{ url('/'. $item->file) }}" alt="">
                            </div>
                            <p class="card-text">{{ $item->isi_laporan }}</p>
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
    </div>
    @endsection
