@extends('layouts.pages.app')
@section('title', 'Envelope')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Detail Aduan</h1>
    
</div>

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $pengaduan->judul_laporan }} - {{ $pengaduan->users->name }}
                </h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" src="{{ url('/'. $pengaduan->file) }}" alt="">
                </div>
                <p>{{ $pengaduan->isi_laporan }}</p>
                <form action=" {{ route('admin/verifikasi/tolak', $pengaduan->id) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger float-right" onclick="return confirm('Yakin?');">Tolak</button>
                    <a href="{{ route('admin/verifikasi/terima', $pengaduan->id) }}" class="btn btn-sm btn-primary" >Terima</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
