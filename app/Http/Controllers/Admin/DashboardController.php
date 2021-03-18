<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Pengaduan;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $menu = Auth::user()->roles->pluck('name');
        $jumlah_aduan = Pengaduan::all()->count();
        $jumlah_pending = Pengaduan::where('status', 'pending')->count();
        $jumlah_diproses = Pengaduan::where('status', 'proses')->count();
        $jumlah_selesai = Pengaduan::where('status', 'selesai')->count();
        return view('admin.dashboard.index',[
            'menu' => $menu,
            'jumlah_aduan' => $jumlah_aduan,
            'jumlah_pending' => $jumlah_pending,
            'jumlah_diproses' => $jumlah_diproses,
            'jumlah_selesai' => $jumlah_selesai,
        ]);
    }
}
