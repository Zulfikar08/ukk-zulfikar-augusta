<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index() {
        $menu = Auth::user()->roles->pluck('name');
        return view('petugas.dashboard.index', [
            'menu' => $menu,
        ]);
    }
}
