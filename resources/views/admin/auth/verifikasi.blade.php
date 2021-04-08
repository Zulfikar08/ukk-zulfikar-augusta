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
        <div class="col-xl-12">

            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0 text-info">Belum diverifikasi</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Berhasil!</strong> {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table align-items-center" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="number">#</th>
                                    <th scope="col" class="sort" data-sort="name">Nama</th>
                                    <th scope="col" class="sort" data-sort="budget">Judul</th>
                                    <th scope="col" class="sort" data-sort="status">Isi</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach( $pengaduan as $item )
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td class="name">{{ $item->users->name }}</td>
                                    <td class="budget">{{ $item->judul_laporan }}</td>
                                    <td>{{ Str::limit($item->isi_laporan, 50, '....') }}</td>
                                    <td>
                                        <a class="badge badge-info"
                                            href="{{ route('admin/detail-verifikasi', $item->id) }}">detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endsection
