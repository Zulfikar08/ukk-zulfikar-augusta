<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pengaduan;
use App\Tanggapan;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index() {
        $menu = Auth::user()->roles->pluck('name');
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return view ('admin.auth.index', [
            'menu' => $menu,
            'users' => $users,
        ]);
    }

    public function time_line() {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::orderBy('id', 'DESC')->paginate(50);
        return view('admin.timeline.index', [
            'menu' => $menu,
            'pengaduan' => $pengaduan
        ]);
    }

    public function detail($id) {
        $menu = Auth::user()->roles->pluck('name');
        $pengaduan = Pengaduan::find($id);
        $user = User::find($id);
        return view('admin.auth.detail', [
            'menu' => $menu,
            'user' => $user,
            'pengaduan' => $pengaduan
        ]);
    }

    public function export_excel() {
        return Excel::download(new UserExport, 'user-report.xlsx');
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
        return view('admin.auth.detail-aduan', [
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
        ]);

        
        // Simpan data
        Tanggapan::create([
            'user_id' => Auth::id(),
            'tgl_tanggapan' => Carbon::now(),
            'isi_tanggapan' => $request->isi_tanggapan,
            'pengaduan_id' => $request->pengaduan_id,
        ]);

        $update = $pengaduan->find($request->pengaduan_id)->update([
            'status' => 'selesai'
        ]);

        return redirect()->back();
    }
}
