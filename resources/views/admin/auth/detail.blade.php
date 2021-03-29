@extends('layouts.pages.app')
@section('title', 'Envelope')

@section('content')
<div class="header bg-gradient-info pb-6">
    <div class="container-fluid">
        <div class="header-body">

            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Detail User</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-md-6">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h5 class="h3 mb-0 text-info">{{ $user->name }}
                                ({{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }})</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">NIK : {{ $user->nik }}</li>
                        <li class="list-group-item">NO.TELP : {{ $user->phone }}</li>
                        <li class="list-group-item">Email : {{ $user->email }}</li>
                        <li class="list-group-item">
                            <form action="{{ route('admin/nonaktif-user', $user->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Yakin?');">nonaktif</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <small>envelope @ copyright <?php echo date('Y'); ?></small>
                </div>
            </div>
        </div>
    </div>
    @endsection
