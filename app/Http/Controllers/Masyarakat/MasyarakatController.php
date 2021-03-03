<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MasyarakatController extends Controller
{
    //
    public function index() {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::all();
        return view('masyarakat.auth.index',[
            'menu' => $menu,
            'pengaduan' => $pengaduan,
        ]);
    }

    public function store(Request $request) {

        $request->validate([
            'judul_laporan' => 'required|max:64',
            'isi_laporan' => 'required',
            'file' => 'required|image|mimes:jpeg,jpg,png|max:4000',
            'nik' => 'required',
        ]);

        $files = $request->file;
        $namaGambar = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $lokasiGambar = 'uploads/'; // upload path
        $files->move($lokasiGambar, $namaGambar);
        
        Pengaduan::create([
            'user_id' => Auth::id(),
            'tgl_pengaduan' => Carbon::now(),
            'nik' => $request->nik,
            'judul_laporan' => $request->judul_laporan,
            'isi_laporan' => $request->isi_laporan,
            'file' =>  'uploads/'.$namaGambar, 
            'status' => 'proses',
            ]);
        return redirect('masyarakat/time-line')->with('success', 'Publish Compllited');
    }

    public function time_line()
    {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::orderBy('id', 'DESC')->paginate(50);
        return view('masyarakat.auth.time-line',[
            'pengaduan' => $pengaduan,
            'menu' => $menu,
        ]);
    }
}
