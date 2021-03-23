@extends('layouts.pages.app')
@section('title', 'Envelope')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    
</div>

<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $user->name }} ({{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }})
                </h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">NIK : {{ $user->nik }}</li>
                    <li class="list-group-item">NO.TELP : {{ $user->phone }}</li>
                    <li class="list-group-item">Email : {{ $user->email }}</li>
                    <li class="list-group-item">
                    <form action="{{ route('petugas/nonaktif-user', $user->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin?');">nonaktif</button>
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
