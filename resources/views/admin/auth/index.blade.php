@extends('layouts.pages.app')
@section('title', 'Envelope | Pengaduan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    <a href="{{ route('admin/user-export') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i>Generate Report
    </a>
</div>

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Berhasil!</strong> {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-lg-12">
        <form method="post" action="{{ route('admin/search') }}" class="form-inline">
            @csrf
            <div class="form-group mr-2 mb-2">
                <input type="text" class="form-control" name="search" id="search" placeholder="Search...">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Cari</button>
        </form>
    </div>
</div>
<div class="row">

    <div class="col-lg-6 mb-4">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $users as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ implode(', ', $item->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                    <a class="badge badge-info"
                                        href="{{ route('admin/detail-user', $item->id) }}">detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data User Nonaktif</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $nonaktif as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ implode(', ', $item->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                    <a class="badge badge-success"
                                        href="{{ route('admin/aktifkan-user', $item->id) }}">aktifkan</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $nonaktif->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
