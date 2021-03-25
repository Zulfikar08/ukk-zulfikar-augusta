<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Pengaduan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Desa;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateProfileRequest;

class MasyarakatController extends Controller
{
    //
    public function index() {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::where('user_id', Auth::id())->get();
        $desa = Desa::all();
        return view('masyarakat.auth.index',[
            'menu' => $menu,
            'pengaduan' => $pengaduan,
            'desa' => $desa,
        ]);
    }

    public function hapus_aduan($id) {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();
        return redirect('masyarakat/tulis-aduan')->with('status', 'Mantap terhapus bro!!');
    }

    public function store(Request $request) {
        $valid = Auth::user()->email_verified_at;
        if ($valid == null) {
            return redirect()->back()->with('error', 'Verifikasi email terlebih dahulu');
        } else {
            $request->validate([
                'judul_laporan' => 'required|max:64',
                'isi_laporan' => 'required',
                'lokasi' => 'required',
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
                'lokasi' => $request->lokasi,
                'file' =>  'uploads/'.$namaGambar, 
                'status' => 'pending',
                ]);
            return redirect('masyarakat/time-line');
        }
    }

    public function edit($id) {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::find($id);
        $desa = Desa::all();
        return view('masyarakat.auth.edit',[
            'menu' => $menu,
            'pengaduan' => $pengaduan,
            'desa' => $desa
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

    /**
     * Update user's profile
     *
     * @param  UpdateProfileRequest $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(UpdateProfileRequest $request) {
        $request->user()->update(
            $request->all()
        );
        return redirect()->back()->with('status', 'Data berhasil di update');
    }
}
