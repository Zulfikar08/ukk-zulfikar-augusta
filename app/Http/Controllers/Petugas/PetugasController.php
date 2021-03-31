<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pengaduan;
use App\User;
use App\Tanggapan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    //
    public function index() 
    {
        $menu = Auth::user()->roles->pluck('name');
        $users = User::orderBy('id', 'ASC')->paginate(10);
        $nonaktif = User::onlyTrashed()->orderBy('id', 'ASC')->paginate(10);
        return view ('petugas.auth.index', [
            'menu' => $menu,
            'users' => $users,
            'nonaktif' => $nonaktif,
        ]);
    }

    public function profile() 
    {
        $menu = Auth::user()->roles->pluck('name');
        $user = Auth::user();
        return view ('petugas.profile.index', [
            'menu' => $menu,
            'user' => $user
        ]);
    }

    public function update(UpdateProfileRequest $request) 
    {
        $request->user()->update(
            $request->all()
        );
        return redirect()->back()->with('status', 'Data berhasil diupdate');
    }

    public function time_line() {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::orderBy('id', 'DESC')->paginate(50);
        return view('petugas.timeline.index', [
            'menu' => $menu,
            'pengaduan' => $pengaduan
        ]);
    }

    public function detail($id)     
    {
    $menu = Auth::user()->roles->pluck('name');
    $pengaduan = Pengaduan::find($id);
    $user = User::find($id);
    return view('petugas.auth.detail', [
        'menu' => $menu,
        'user' => $user,
        'pengaduan' => $pengaduan
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
        return view('petugas.auth.detail-aduan', [
            'menu' => $menu,
            'pengaduan' => $pengaduan,
            'user' => $user,
            'tanggapan' => $tanggapan
        ]);
    }

    public function kirim_tanggapan(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'isi_tanggapan' => 'required',
            'pengaduan_id' => 'required',
            'status' => 'required'
        ], [
            'isi_tanggapan.required' => 'wajib diisi',
            'status.required' => 'wajid diisi!',
        ]);

        
        // Simpan data
        Tanggapan::create([
            'user_id' => Auth::id(),
            'tgl_tanggapan' => Carbon::now(),
            'isi_tanggapan' => $request->isi_tanggapan,
            'pengaduan_id' => $request->pengaduan_id,
        ]);

        $update = $pengaduan->find($request->pengaduan_id)->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }
}
