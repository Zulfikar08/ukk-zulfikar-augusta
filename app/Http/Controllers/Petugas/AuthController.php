<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pengaduan;


class AuthController extends Controller
{
    //
    public function verifikasi(){
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::where('status', 'pending')->paginate(10);
        return view('petugas.auth.verifikasi', [
            'pengaduan' => $pengaduan,
            'menu' => $menu,
        ]);
    }

    public function detail_verif($id){
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::find($id);
        return view('petugas.auth.detail-verif', [
            'pengaduan' => $pengaduan,
            'menu' => $menu,
        ]);
    }

    public function tolak($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->status = 'reject';
        $pengaduan->save();
        return redirect('petugas/verifikasi')->with('status', 'Data pengaduan berhasil diolak!');
    }

    public function terima($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->status = 'proses';
        $pengaduan->save();
        return redirect('petugas/verifikasi')->with('status', 'Data pengaduan berhasil diterima!');
    }
}
