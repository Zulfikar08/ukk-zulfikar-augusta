<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MasyarakatController extends Controller
{
    //
    public function index() {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::where('user_id', Auth::id())->get();
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
            'status' => 'pending',
            ]);
        return redirect('masyarakat/time-line');
    }

    public function edit($id) {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::find($id);
        return view('masyarakat.auth.edit',[
            'menu' => $menu,
            'pengaduan' => $pengaduan
        ]);
    }

    public function edit_kirim(Request $request, $id) {
        $request->validate([
            'judul_laporan' => 'required|max:64',
            'isi_laporan' => 'required',
            'file' => 'required|image|mimes:jpeg,jpg,png|max:4000',
            'nik' => 'required',
            'status' => 'required',
        ]);

        $files = $request->file;
        $namaGambar = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $lokasiGambar = 'uploads/'; // upload path
        $files->move($lokasiGambar, $namaGambar);
        
        Pengaduan::find($id)->update([
            'user_id' => Auth::id(),
            'tgl_pengaduan' => Carbon::now(),
            'nik' => $request->nik,
            'judul_laporan' => $request->judul_laporan,
            'isi_laporan' => $request->isi_laporan,
            'file' =>  'uploads/'.$namaGambar, 
            'status' => $request->status,
            ]);
        return redirect()->back()->with('status', 'Update berhasil');
    }

    public function time_line()
    {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::orderBy('id', 'DESC')->paginate(50);
        return view('masyarakat.timeline.index',[
            'pengaduan' => $pengaduan,
            'menu' => $menu,
        ]);
    }

    public function tanggapan($id) {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::find($id);
        $user = Auth::user();
        $tanggapan = DB::table('tanggapans')
        ->join('users', 'users.id', '=', 'tanggapans.user_id')
        ->join('pengaduans', 'pengaduans.id', '=', 'tanggapans.pengaduan_id')
        ->select('users.*', 'pengaduans.*', 'tanggapans.*', DB::raw('users.name AS nama_user'))
        ->where('pengaduan_id', $id)
        ->get();
        return view('masyarakat.auth.tanggapan', [
            'menu' => $menu,
            'pengaduan' => $pengaduan,
            'user' => $user,
            'tanggapan' => $tanggapan
        ]);
    }
    public function profile(User $user)
    {
        $menu = Auth::user()->roles->pluck('name');
        $user = Auth::user();
        return view('masyarakat.auth.profile',[
            'menu' => $menu,
            'user' => $user,
        ]);
    }
}
