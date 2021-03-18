<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pengaduan;
use Illuminate\Http\Request;
use App\User;   
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function verifikasi(){
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::where('status', 'pending')->paginate(10);
        return view('admin.auth.verifikasi', [
            'pengaduan' => $pengaduan,
            'menu' => $menu,
        ]);
    }

    public function detail_verif($id){
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::find($id);
        return view('admin.auth.detail-verif', [
            'pengaduan' => $pengaduan,
            'menu' => $menu,
        ]);
    }

    public function tolak($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->status = 'tolak';
        $pengaduan->save();
        return redirect('admin/verifikasi')->with('status', 'Data pengaduan berhasil diolak!');
    }

    public function terima($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->status = 'proses';
        $pengaduan->save();
        return redirect('admin/verifikasi')->with('status', 'Data pengaduan berhasil diterima!');
    }
}
