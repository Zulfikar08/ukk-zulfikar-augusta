@extends('layouts.pages.app')
@section('title', 'Envelope | Tanggapan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tanggapan</h1>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-lg-7 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $pengaduan->users->name }} -
                    {{ $pengaduan->judul_laporan }}</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 60%; height:60%;"
                            src="{{ url('/'. $pengaduan->file) }}" alt="">
                    </div>
                    <p class="text-gray">
                        <small>{{ $pengaduan->tgl_pengaduan }}</small>
                    </p>
                    <p>{{ $pengaduan->isi_laporan }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5 mb-4">
        @foreach( $tanggapan as $item )
        <ul class="list-group mb-3">
            <li class="list-group-item active">{{ $item->name }}</li>
            <li class="list-group-item">{{ $item->isi_tanggapan }}</li>
        </ul>
        @endforeach
        <form method="POST" action="{{ route('admin/tanggapan/kirim') }}">
            @csrf
            <div class="form-group">
                <input type="hidden" name="pengaduan_id" value="{{ $pengaduan->id }}">
                <input type="text" class="form-control" id="tanggapan" name="isi_tanggapan" aria-describedby="emailHelp"
                    placeholder="Tulis tanggapan" autofocus>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="selesai" name="proses" id="check-proses">
                        <label class="form-check-label" for="check-proses">
                            Selesai
                        </label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary float-right">kirim</button>
                </div>
            </div>
        </form>
    </div>


</div>
@endsection
