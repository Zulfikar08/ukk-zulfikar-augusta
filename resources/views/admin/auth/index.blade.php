@extends('layouts.pages.app')
@section('title', 'Envelope | Pengaduan')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    <a href="{{ route('admin/export-excel') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i>Generate Report
    </a>
</div>

<div class="row">
    <div class="col-lg-9 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel data User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>role</th>
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
                                    <a class="badge badge-danger"
                                        href="{{ route('admin/nonaktif-user', $item->id) }}">nonaktif</a>
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
    
</div>
@endsection
