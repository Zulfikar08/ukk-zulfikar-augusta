@extends('layouts.pages.app')
@section('title', 'Envelope | Nonaktif')

@section('content')
<div class="header bg-gradient-info pb-6">
    <div class="container-fluid">
        <div class="header-body">

            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">User</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0 text-warning">Data User Nonaktif</h5>
                        </div>
                    </div>
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
                    </div>
                </div>
            </div>
        </div>

        @endsection
